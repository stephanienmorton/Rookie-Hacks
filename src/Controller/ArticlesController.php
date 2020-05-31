<?php
// namespace App\Controller;

// class ArticlesController extends AppController
// {
//     public function index()
//     {
//         $this->loadComponent('Paginator');
//         $articles = $this->Paginator->paginate($this->Articles->find());
//         $this->set(compact('articles'));
//     }

//     public function view($slug = null)
//     {
//         $article = $this->Articles->findBySlug($slug)->firstOrFail();
//         $this->set(compact('article'));
//     }
// }

namespace App\Controller;

use App\Controller\AppController;
use Authorization\IdentityInterface;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Middleware\AuthenticationMiddleware;
use Psr\Http\Message\ServerRequestInterface;


// AuthComponent::user('id');

class ArticlesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
        $articles = $this->Paginator->paginate($this->Articles->find());

        // $user = $this->Authorization->getIdentity();
        // $userID = $user->id;

        $user = $this->getRequest()->getAttribute('identity');
        $userID = $user['id'] ?? null;
        // $userID = 2;

        $this->set(compact('articles'));
        $this->Authorization->skipAuthorization();
    }

    public function bookshelf()
    {
        $articles = $this->Paginator->paginate($this->Articles->find());

        // $user = $this->Authorization->getIdentity();
        // $userID = $user->id;

        $user = $this->getRequest()->getAttribute('identity');
        $userID = $user['id'] ?? null;
        // $userID = 2;

        $this->set(compact('articles'));
        $this->Authorization->skipAuthorization();
    }

    public function view($slug)
    {
        $article = $this->Articles
            ->findBySlug($slug)
            ->contain('Tags')
            ->firstOrFail();
        $this->set(compact('article'));
        $this->Authorization->skipAuthorization();
    }

    // add
    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
        $this->Authorization->authorize($article);

        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            // Changed: Set the user_id from the current user.
            $article->user_id = $this->request->getAttribute('identity')->getIdentifier();

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $tags = $this->Articles->Tags->find('list');
        $this->set(compact('article', 'tags'));
    }

    // edit
    public function edit($slug)
    {
        $article = $this->Articles
            ->findBySlug($slug)
            ->contain('Tags') // load associated Tags
            ->firstOrFail();
        $this->Authorization->authorize($article);

        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your article.'));
        }
        $tags = $this->Articles->Tags->find('list');
        $this->set(compact('article', 'tags'));
    }

    // delete
    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $this->Authorization->authorize($article);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The {0} article has been deleted.', $article->title));
            return $this->redirect(['action' => 'index']);
        }
    }

    // tagged
    public function tags()
    {
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $tags = $this->request->getParam('pass');

        // Use the ArticlesTable to find tagged articles.
        $articles = $this->Articles->find('tagged', [
            'tags' => $tags
        ]);

        // Pass variables into the view template context.
        $this->set([
            'articles' => $articles,
            'tags' => $tags
        ]);
        $this->Authorization->skipAuthorization();
    }
}