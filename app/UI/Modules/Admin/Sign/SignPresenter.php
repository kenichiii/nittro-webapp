<?php declare(strict_types = 1);

namespace App\UI\Modules\Admin\Sign;

use App\Model\App;
use App\UI\Form\BaseForm;
use App\UI\Form\FormFactory;
use App\UI\Modules\Admin\BaseAdminPresenter;

final class SignPresenter extends BaseAdminPresenter
{

	/** @var string @persistent */
	public string $backlink;

	/** @var FormFactory @inject */
	public FormFactory $formFactory;

	public function checkRequirements(mixed $element): void
	{
		// Disable auth
	}

	public function actionIn(): void
	{
		if ($this->user->isLoggedIn()) {
			$this->redirect(App::DESTINATION_AFTER_SIGN_IN);
		}

	}

	public function actionOut(): void
	{
		if ($this->user->isLoggedIn()) {
			$this->user->logout();
			$this->flashSuccess('admin.sign.out.success');
		}

		$this->redirect(App::DESTINATION_AFTER_ADMIN_SIGN_OUT);
	}

	public function processLoginForm(BaseForm $form): void
	{
		try {
			$this->user->setExpiration($form->values->remember ? '14 days' : '20 minutes');
			$this->user->login($form->values->email, $form->values->password);
			$this->disallowAjax();
			$this->redirect(App::DESTINATION_ADMIN_HOMEPAGE);
		} catch (\Throwable $e) {
			$form->addError('Invalid username or password');
			$this->redrawControl('content');
		}
	}

	protected function createComponentLoginForm(): BaseForm
	{
		$form = $this->formFactory->forBackend();
		$form->addEmail('email')
			->setRequired(true);
		$form->addPassword('password')
			->setRequired(true);
		$form->addCheckbox('remember')
			->setDefaultValue(true);
		$form->addSubmit('submit');
		$form->onSuccess[] = [$this, 'processLoginForm'];

		return $form;
	}

}
