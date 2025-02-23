<?php declare(strict_types = 1);

namespace App\UI\Modules\Base;

use App\Model\Latte\TemplateProperty;
use App\Model\Security\SecurityUser;
use App\UI\Control\TFlashMessage;
use App\UI\Control\TModuleUtils;
use App\UI\Control\TTranslate;
use Contributte\Application\UI\Presenter\StructuredTemplates;
use Nittro\Bridges\NittroUI\Presenter;

/**
 * @property-read TemplateProperty $template
 * @property-read SecurityUser $user
 */
abstract class BasePresenter extends Presenter
{

	use StructuredTemplates;
	use TFlashMessage;
	use TModuleUtils;
	use TTranslate;
}
