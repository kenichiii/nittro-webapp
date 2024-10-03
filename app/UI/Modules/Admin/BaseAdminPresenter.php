<?php declare(strict_types = 1);

namespace App\UI\Modules\Admin;

use App\Model\App;
use App\UI\Modules\Base\SecuredPresenter;

abstract class BaseAdminPresenter extends SecuredPresenter
{
	protected function startup()
	{
		parent::startup();

		$this->setDefaultSnippets(['content']);
	}

	public function checkRequirements(mixed $element): void
	{
		parent::checkRequirements($element);

		if (!$this->user->isAllowed('Admin:Home')) {
			$this->flashError($this->_('You cannot access this with user role'));
			$this->redirect(App::DESTINATION_FRONT_HOMEPAGE);
		}
	}

}
