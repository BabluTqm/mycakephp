<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Insert Controller
 *
 * @property \App\Model\Table\InsertTable $Insert
 * @method \App\Model\Entity\Insert[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InsertController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $insert = $this->paginate($this->Insert);

        $this->set(compact('insert'));
    }

    /**
     * View method
     *
     * @param string|null $id Insert id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $insert = $this->Insert->get($id, [
            'contain' => ['Insert'],
        ]);

        $this->set(compact('insert'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $insert = $this->Insert->newEmptyEntity();
        if ($this->request->is('post')) {
            $insert = $this->Insert->patchEntity($insert, $this->request->getData());
            if ($this->Insert->save($insert)) {
                $this->Flash->success(__('The insert has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The insert could not be saved. Please, try again.'));
        }
        $this->set(compact('insert'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Insert id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $insert = $this->Insert->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $insert = $this->Insert->patchEntity($insert, $this->request->getData());
            if ($this->Insert->save($insert)) {
                $this->Flash->success(__('The insert has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The insert could not be saved. Please, try again.'));
        }
        $this->set(compact('insert'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Insert id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $insert = $this->Insert->get($id);
        if ($this->Insert->delete($insert)) {
            $this->Flash->success(__('The insert has been deleted.'));
        } else {
            $this->Flash->error(__('The insert could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
