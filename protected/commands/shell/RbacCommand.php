<?php
class RbacCommand extends CConsoleCommand
{
     private $_authManager;
     
     public function run ($args)
     {
     	if(($this->_authManager=Yii::app()->authManager)===null)
     	{
     		echo "Error: an autorzation manager, named 'authManager' needs to be configured to use this command. \n";

     		echo "If you already added 'authManager' component in application configuration, \n";

     		echo "please quit and re-enter the yiic shell command. \n";
     		

     		return;
     	}

          else
          {
          echo"This command will create three roles:Owner, Reader and Admin and the following permissions: \n";
          echo"read, create, update and delete user \n";
          echo"read, create, update and delete product \n";
          echo"read, create, update and delete thread \n";
          echo"read, create, update and delete comment \n";
          echo"read, create, update and delete category \n";
          echo"Would you like to continue? [Yes|No]";
          }

          if(!strncasecmp(trim(fgets(STDIN)),'y','1'))
          {
               $this->_authManager->createOperation('readUser');
               $this->_authManager->createOperation('updateUser');
               $this->_authManager->createOperation('createUser');
               $this->_authManager->createOperation('deleteUser');

               $this->_authManager->createOperation('readProduct');
               $this->_authManager->createOperation('updateProduct');
               $this->_authManager->createOperation('createProduct');
               $this->_authManager->createOperation('deleteProduct');

               $this->_authManager->createOperation('readCategory');
               $this->_authManager->createOperation('updateCategory');
               $this->_authManager->createOperation('createCategory');
               $this->_authManager->createOperation('deleteCategory');


               $this->_authManager->createOperation('readThread');
               $this->_authManager->createOperation('updateThread');
               $this->_authManager->createOperation('createThread');
               $this->_authManager->createOperation('deleteThread');


               $this->_authManager->createOperation('readComment');
               $this->_authManager->createOperation('updateComment');
               $this->_authManager->createOperation('createComment');
               $this->_authManager->createOperation('deleteComment');


               $role=$this->_authManager->createRole('reader');
               $role->addChild('readUser');
               $role->addChild('readProduct');
               $role->addChild('readCategory');
               $role->addChild('readThread');
               $role->addChild('readComment');
               $role->addChild('createComment');

               $role=$this->_authManager->createRole('owner');
               $role->addChild('reader');
               $role->addChild('updateUser');
               $role->addChild('createThread');

               $this->_authManager->createTask('adminManagement');
               $role=$this->_authManager->createRole('admin');
               $role->addChild('reader');
               $role->addChild('owner');
               $role->addChild('adminManagement');
               $role->addChild('createProduct');
               $role->addChild('updateProduct');
               $role->addChild('deleteProduct');
               $role->addChild('deleteUser');
               $role->addChild('updateCategory');
               $role->addChild('createCategory');
               $role->addChild('deleteCategory');
               $role->addChild('updateThread');
               $role->addChild('deleteThread');
               $role->addChild('deleteComment');
               $role->addChild('updateComment');
               $this->_authManager->assign('admin',1);


               echo"Authorization was generated successfully";


          }
     }
}
