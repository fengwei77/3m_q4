<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Post;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class PostController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Post(), function (Grid $grid) {
            $grid->sortable();

            $grid->column('id')->sortable();
            $grid->column('fb_id');
            $grid->column('fb_name');
            $grid->column('fb_email');
            $grid->column('post_url');
            $grid->column('embed_code')->display(function () {
                return $this->embed_code;
            });
            $grid->column('enabled');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Post(), function (Show $show) {
            $show->field('id');
            $show->field('fb_id');
            $show->field('fb_name');
            $show->field('fb_email');
            $show->field('post_url');
            $show->field('embed_code');
            $show->field('enabled');
            $show->field('sort_number');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Post(), function (Form $form) {
            $form->display('id');
            $form->text('fb_id');
            $form->text('fb_name');
            $form->text('fb_email');
            $form->text('post_url');
            $form->textarea('embed_code')->rows(10);

            $form->text('enabled');
            $form->text('sort_number');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
