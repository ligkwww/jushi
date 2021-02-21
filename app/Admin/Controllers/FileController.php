<?php

namespace App\Admin\Controllers;

use App\Models\File;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FileController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'File';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new File());

        $grid->column('id', __('Id'));
        $grid->column('name', __('标题'));
        $grid->column('category_id', __('类型'))->display(function ($categoryId) {
            return File::$categories[$categoryId];
        });
        $grid->column('disk_type', __('网盘类型'))->display(function ($diskType) {
            return File::$diskType[$diskType];
        });
        $grid->column('disk_addr', __('网盘地址'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(File::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('category_id', __('Category id'));
        $show->field('disk_addr', __('Disk addr'));
        $show->field('disk_type', __('Disk type'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new File());

        $form->text('name', __('标题'));
        $form->select('category_id', __('分类'))->options(File::$categories)->default(1);
        $form->select('disk_type', __('网盘类型'))->options(File::$diskType)->default(1);
        $form->text('disk_addr', __('网盘地址'));

        return $form;
    }
}
