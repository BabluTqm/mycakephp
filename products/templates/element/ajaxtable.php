<table class="table table-border datatable">
                
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('email') ?></th>
                        <th><?= $this->Paginator->sort('user_type') ?></th>
                        <th><?= $this->Paginator->sort('status') ?></th>
                        <th><?= $this->Paginator->sort('Profle Image') ?></th>
                        <th><?= $this->Paginator->sort('created_date') ?></th>
                        <th><?= $this->Paginator->sort('modified_date') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    <?php foreach ($users as $user): 
              
             
    
                        if($result->id == $user->id){
                            continue;
                        }
                      
                        ?>
    
                    <tr>
                        <td><?=  ++$count ?></td>
                        <td><?= h($user->email) ?></td>
                        <!-- Start User Type -->
                        <td>
                        <?php if($user->user_type == 1) : ?>
                        <?= $this->Form->postLink(__('User'), ['action' => 'userType', $user->id ,$user->user_type], ['confirm' => __('Are you sure you want to Inactive # {0}?', $user->id)]) ?>
    
                        <?php else: ?>
                        <?= $this->Form->postLink(__('Admin'), ['action' => 'userType', $user->id ,$user->user_type], ['confirm' => __('Are you sure you want to Active # {0}?', $user->id)]) ?>
                        <?php endif ; ?>
                        </td>
                       <!-- End User Type -->
    
                        <td>
                        <?php if($user->status == 1) : ?>
                        <?= $this->Form->postLink(__('Active'), ['action' => 'userStatus', $user->id ,$user->status], ['confirm' => __('Are you sure you want to Inactive # {0}?', $user->id)]) ?>
    
                        <?php else: ?>
                        <?= $this->Form->postLink(__('Inactive'), ['action' => 'userStatus', $user->id ,$user->status], ['confirm' => __('Are you sure you want to Active # {0}?', $user->id)]) ?>
                        <?php endif ; ?>
                        </td>
    
                          
                        <td><?= $this->Html->image($user->user_profile->profile_image,['width'=>'100px','height'=>'100px']) ?></td>


                            <?php
                                $cre_time = $user->created_date;
                                $date = new DateTime($cre_time, new DateTimeZone('UTC'));
                                $date->setTimezone(new DateTimeZone("Asia/Kolkata"));
                                $cre_time= $date->format('d-m-Y H:i:a');  
                            ?>
    
                        <td><?= h($cre_time);?></td>

                        <?php
                                $mod_time = $user->modified_date;
                                $date = new DateTime($mod_time, new DateTimeZone('UTC'));
                                $date->setTimezone(new DateTimeZone("Asia/Kolkata"));
                                $mod_time= $date->format('d-m-Y H:i:a');  
                            ?>
                        <td><?= h($mod_time)  ;?></td>
                         
                        <td class="actions">
                            <?= $this->Html->link(__(''), ['action' => 'view', $user->id],['class' => 'fa-solid fa-eye' ]) ?>
                            <?= $this->Html->link(__(''), ['action' => 'edit', $user->id], ['class' => 'fa-solid fa-pencil']) ?>
                            <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id],  ['class' => 'fa-solid fa-trash'],['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>