<div class="users form">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <fieldset class="login">
        <h3 class="tabla"><?= __('Ingrese credenciales de acceso') ?></h3>
        <?= $this->Form->control('email', ['label' => 'Email','required' => true]) ?>
        <?= $this->Form->control('password', ['label' => 'Contraseña','required' => true]) ?>
        <?= $this->Form->submit(__('Enviar')); ?>
    <?= $this->Form->end() ?>
    </fieldset>
 
</div>