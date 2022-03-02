<!------------------------------------------------------------------------------
| List of elements in helpdesk form
|------------------------------------------------------------------------------->

{!! Form::open(['route'=>['helpdesk.post', 'id' => @$item->id],  'files'=>true, 'method' => 'post'])  !!}

    <!--BUTTONS-->
    <div class='btn-form'>
        @if(isset($item) && $item->deleted_at)
            <a href="{!! URL::route('helpdesk.restore',['id' => $item->id, '_token' => csrf_token()]) !!}"
               class="btn btn-success pull-right margin-left-5 restore">
                {!! trans($plang_admin.'.buttons.restore') !!}
            </a>
        @elseif (isset($item))
            <a href="{!! URL::route('helpdesk.delete',['id' => @$item->id, '_token' => csrf_token()]) !!}"
               class="btn btn-warning pull-right margin-left-5 delete">
                {!! trans($plang_admin.'.buttons.delete') !!}
            </a>
        @endif
        <!-- SAVE BUTTON -->
            {!! Form::submit(trans($plang_admin.'.buttons.save'), array("class"=>"btn btn-info pull-right ")) !!}
        <!-- /SAVE BUTTON -->
    </div>
    <!--/BUTTONS-->

    <!--TAB MENU-->
    <ul class="nav nav-tabs">
        <!--MENU 1-->
        <li class="active">
            <a data-toggle="tab" href="#menu_1">
                {!! trans($plang_admin.'.tabs.menu-1') !!}
            </a>
        </li>
        <!--OTHER-->
        <li>
            <a data-toggle="tab" href="#menu_3">
                {!! trans($plang_admin.'.tabs.other') !!}
            </a>
        </li>
    </ul>
    <!--/TAB MENU-->

    <!--TAB CONTENT-->
    <div class="tab-content">

        <!--MENU 1-->
        <div id="menu_1" class="tab-pane fade in active">

            <!--NAME-->
            @include('package-category::admin.partials.input_text', [
                'name' => 'helpdesk_name',
                'label' => trans($plang_admin.'.labels.helpdesk_name'),
                'value' => @$item->helpdesk_name,
                'description' => trans($plang_admin.'.descriptions.helpdesk_name'),
                'errors' => $errors,
            ])
            <!--/NAME-->

            <!--SITE SLUG-->
            @include('package-category::admin.partials.input_slug', [
                'name' => 'helpdesk_slug',
                'id' => 'helpdesk_slug',
                'ref' => 'helpdesk_name',
                'label' => trans($plang_admin.'.labels.slug'),
                'value' => @$item->helpdesk_slug,
                'description' => trans($plang_admin.'.descriptions.slug'),
                'errors' => $errors,
            ])
            <!--/SITE SLUG-->

            <!--WEBSITE-->
            @include('package-category::admin.partials.input_text', [
                'name' => 'helpdesk_website',
                'label' => trans($plang_admin.'.labels.helpdesk_website'),
                'value' => @$item->helpdesk_website,
                'description' => trans($plang_admin.'.descriptions.helpdesk_website'),
                'errors' => $errors,
            ])
            <!-- /WEBSITE-->

            <!--ADDRESS-->
            @include('package-category::admin.partials.input_text', [
                'name' => 'helpdesk_address',
                'label' => trans($plang_admin.'.labels.helpdesk_address'),
                'value' => @$item->helpdesk_address,
                'description' => trans($plang_admin.'.descriptions.helpdesk_address'),
                'errors' => $errors,
            ])
            <!-- /ADDRESS-->

            <div class="row">
                <div class='col-md-6'>
                    <!--CATEGORY ID-->
                    @include('package-category::admin.partials.select_single', [
                        'name' => 'category_id',
                        'label' => trans($plang_admin.'.form.category_id'),
                        'value' => @$item->category_id,
                        'items' => $categories,
                        'description' => trans($plang_admin.'.descriptions.category_id'),
                    ])
                    <!--/CATEGORY ID-->
                </div>

                <div class="col-md-6">
                    <!--STATUS-->
                    @include('package-category::admin.partials.select_single', [
                        'name' => 'status',
                        'label' => trans($plang_admin.'.form.status'),
                        'value' => @$item->status,
                        'items' => $status,
                        'description' => trans($plang_admin.'.descriptions.status'),
                    ])
                    <!--/STATUS-->
                </div>
            </div>

             <!--DESCRIPTION-->
            @include('package-category::admin.partials.textarea', [
                'name' => 'helpdesk_description',
                'label' => trans($plang_admin.'.labels.helpdesk_description'),
                'value' => @$item->helpdesk_description,
                'description' => trans($plang_admin.'.descriptions.helpdesk_description'),
                'rows' => 25,
                'tinymce' => true,
                'errors' => $errors,
            ])
            <!--/DESCRIPTION-->
        </div>
        <!--/END MENU1-->
        <!--OTHER-->
        <div id="menu_3" class="tab-pane fade">
            <!--SITE IMAGE-->
            @include('package-category::admin.partials.input_image', [
                'name' => 'helpdesk_image',
                'label' => trans($plang_admin.'.labels.helpdesk_image'),
                'value' => @$item->helpdesk_image,
                'description' => trans($plang_admin.'.descriptions.helpdesk_image'),
                'errors' => $errors,
                'lfm_config' => TRUE
            ])
            <!--/SITE IMAGE-->
        </div>

    </div>
    <!--/TAB CONTENT-->

    <!--HIDDEN FIELDS-->
    <div class='hidden-field'>
        {!! Form::hidden('id',@$item->id) !!}
        {!! Form::hidden('context',$request->get('context',null)) !!}
    </div>
    <!--/HIDDEN FIELDS-->

{!! Form::close() !!}
<!------------------------------------------------------------------------------
| End list of elements in helpdesk form
|------------------------------------------------------------------------------>
