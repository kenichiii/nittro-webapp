<?php declare(strict_types = 1);

namespace App\UI\Form;

use Nette;

final class FormFactory
{
	use Nette\SmartObject;

	public function __construct(
		private Nette\Security\User $user,
		private Nette\Localization\Translator $translator
	)
	{
	}


	public function forFrontend(): BaseForm
	{
		return $this->create();
	}

	public function forBackend(): BaseForm
	{
		return $this->create();
	}

	private function create(): BaseForm
	{
		$form = new BaseForm();
		$form->setTranslator($this->translator);
		return $form;
	}

}
