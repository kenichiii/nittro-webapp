<?php declare(strict_types = 1);

namespace App\UI\Modules\Admin\Users;

use App\Domain\User\UserRepository;
use App\UI\Modules\Admin\BaseAdminPresenter;
use Ublaboo\DataGrid\DataGrid;

final class UsersPresenter extends BaseAdminPresenter
{
	/**
	 * @var UserRepository @inject
	 */
	public UserRepository $userRepository;

	public function createComponentGrid(): DataGrid
	{
		$grid = new DataGrid();

		$grid->setDataSource($this->userRepository->findAll());

		$grid->setItemsPerPageList([20, 50, 100], true);

		$grid->addColumnText('id', 'Id')
			->setSortable();

		$grid->addColumnText('email', 'E-mail')
			->setSortable()
			->setFilterText();

		$grid->addColumnText('name', 'Name')
			->setFilterText();

		return $grid;
	}
}
