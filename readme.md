# Laravel Form Builder

Laravel plugin for quick form creation with Bootstrap support. 

You can show validation errors, old input values and form context based on model entity without any line of code. 

And you can simply redefine or adjust all what you want.

## Basic example

Your code:

```
{!! Form::create('ArticleController@update', $article) !!}
{!! Form::input('name', 'Name') !!}
{!! Form::button('Update') !!}
{!! Form::end() !!}
```

Output:

```
<form method="post" action="/article/1" id="update-article" > 
    <input type="hidden" name="_token" value="P6LpFJ0bZf4s9aKOi8pSoZXTMITDxtRtQ98qF4wZ"> 
    <input type="hidden" name="_method" value="PUT"> 
    
    <div class="form-group ">
        <label for="update-article-name" class="col-md-4 control-label">
            Name
        </label>
        <div class="col-md-6">
            <input id="update-article-name" class="form-control" name="name" value="Name of the article">
        </div>
    </div> 
    
    <div class="form-group"> 
        <div class="col-md-8 col-md-offset-4"> 
            <button id="update-article-submit" type="submit"> 
                Update
            </button>
        </div>
    </div>
</form>
```

Of course, you can disable bootstrap, set global configs, edit templates etc! See below.

## Table of Contents

- [How to install](#how_to_install)
- [Basic example](#basic_example)
- [Customization](#customization)
    * [Parameters](#parameters)
    * [Full list of parameters](#full_list_of_parameters)
    * [Template editing](#template_editing)
    * [Configs](#configs)
    * [Disable Bootstrap](#disable_bootstrap)
- [List of methods](#list_of_methods)


## How to install

TEMPORARY:

```
    "repositories": [
        {
            "type": "vcs",
            "url": "git@bitbucket.org:a2design/laravel-form-builder.git"
        }
    ],
```

Install the package:

```
composer require a2design-inc/laravel-form-builder
```

Register the provider (config/app.php):

```
A2design\Form\FormServiceProvider::class,
```

And the alias:

```
'Form' => A2design\Form\FormFacade::class,
```

Publish the package assets (if you need to change the config file or templates):

```
php artisan vendor:publish
```

## Customization

### Parameters

You can specify a lot of additional parameters:

```
{!! Form::create('', null, [
    //set custom method url
    'url' => 'http://google.com',
    //set method
    'method' => 'POST',
    //your class
    'class' => 'my-form',
    //etc
]) !!}

{!! Form::input('', '', ['label' => false]) !!}
```

### Full list of parameters
    
| Element          | Parameter               | Description                                  |
|------------------|-------------------------|----------------------------------------------|
| Everywhere       | class                   | Class attribute                              |
|                  | id                      | Id attribute. Generated automatically. If you don't need, specify empty string or redefine by id what you want. Or just adjust globally in config file |
|                  | use-grid                | Set false to disable the grid classes        |
| Form::create     |                         | Note: you can use other parameters here to apply them for all inputs, buttons etc inside the form |
|                  | method                  | POST, GET, PUT etc                           |
|                  | absolute                | Absolute path of the method                  |
|                  | url                     | Use the url instead action argument          |
|                  | form-direction-class    | Use some class for label->input direction    |
| Form::input      | all-errors              | List all of the validation errors fot the input instead only first |
|                  | error                   | Set text of error or false to force hide     |
|                  | required                | Set true for the attribute using             |
|                  | readonly                | Set true for the attribute using             |
|                  | disabled                | Set true for the attribute using             |
|                  | autofocus               | Set true for the attribute using             |
|                  | type                    | Set the type attribute                       |
|                  | enctype                 | Set the enctype attribute                    |
|                  | wrapper-class           | Set the class of the input wrapper div       |
|                  | form-group-wrapper-class| Set the class of the form-group wrapper div  |
|                  | label-class             | Set the class of the label                   |
|                  | value                   | Define your own value                        |
|                  | wrapper                 | Set false if you don't need the wrapper div  |
|                  | form-group-wrapper      | Set false if you don't need the wrapper div  |
|                  | label                   | Set false if you don't need the label or set some string with HTML |
|                  | control-label-class     | Redefine the default bootstrap class for each label ("control-label") or disable it |
|                  | form-group-class        | Specify any class instead the "form-group" or set false |
|                  | form-control-class      | Specify any class for the input instead the "form-control" or set false |
|                  | label-grid-class        | Specify any class for the label grid column or set false to use without grid |
|                  | input-grid-class        | Specify any class for the input grid column or set false to use without grid |
|                  | error-form-group-class  | Specify any class for the form group with error or set false |
|                  | error-class             | Specify any class for the input with error or set false |
| Form::button     | type                    | Set the type attribute                       |
|                  | name                    | Set the name attribute                       |
|                  | value                   | Set the value attribute                      |
|                  | form                    | Set the form attribute                       |
|                  | autofocus               | Set true for the attribute using             |
|                  | disabled                | Set true for the attribute using             |
|                  | escaped                 | Set true/false for the button text escaping  |
|                  | form-group-wrapper      | Set false if you don't need the wrapper div  |
|                  | form-group-wrapper-class| Set the class of the form-group wrapper div  |
|                  | button-grid-class       | Specify any class for the button grid column or set false to use without grid |
|                  | wrapper-class           | Set the class of the input wrapper div       |
|                  | btn-class               | Specify any class for the input instead the default "btn" or set false |
|                  | label                   | Set false (default) if you don't need the label or set some string with HTML |

### Template editing

The package is used the laravel blade templates for all form elements. Feel free to customize what you need.

Don't forget to publish the package assets for this:

```
php artisan vendor:publish
```

### Configs

Edit the config/form.php file to change the global settings. Don't forget to publish the package assets for this:

```
php artisan vendor:publish
```

| Config | Values | Default | Meaning | Description |
|--------|--------|---------|---------|-------------|
| generate_id | true, false | true | Generate ids for elements | When enabled the ids for inputs, labels, wrappers etc are generated based on entity name, field name and controller method |
| control_label_class | false, 'string' | 'control-label' | Class for each label | Redefine the default bootstrap "control-label" class or disable it |
| label_grid_class | false, 'string' | 'col-md-4' | Class for grid column with label | Some class name for the grid |
| input_grid_class | false, 'string' | 'col-md-6' | Class for grid column with input | Some class name for the grid |
| route_name_space | 'string' | 'App\Http\Controllers' | The namespace of controllers | Defined at RouteServiceProvider |
| controller_naming | 'string' | 'Controller' | The name of controllers | End of your controllers' names By default is just "Controller" when you use ArticleController, UserController etc |
| form_group_class | false, 'string' | 'form-group' | Class for form group | Redefine the default bootstrap "form-group" class or disable it |
| form_control_class | false, 'string' | 'form-control' | Class for for input | Redefine the default bootstrap "form-control" class or disable it |
| error_form_group_class |false, 'string' | 'has-error' | Class for form group with error | Redefine the default bootstrap "has-error" class or disable it |
| error_class | false, 'string' | 'has-error' | Class for input with error | Define the class or disable it |
| btn_class | false, 'string' | 'btn btn-primary' | Class for for button | Redefine the default bootstrap "btn" class or disable it |
| button_grid_class | false, 'string' | 'col-md-8 col-md-offset-4' | Class for grid column with button | Some class name for the grid |
| form_direction_class | false, 'string' | 'form-horizontal' | Class for form direction | Redefine the default bootstrap "form-horizontal" class or disable it |
| use_grid | true, false | 'form-horizontal' | Use grid classed | When enabled the labels and inputs is located in different columns |

### Disable Bootstrap
 
 You can remove any class or wrapper for single element by parameters or globally in config file.
 
 Or you can use shortcuts which disable few parameters simultaneously
 
```
     'use-grid' => false,
```

## List of methods

#### Elements

 - Form::create($action = '', $entity = null, $parameters = [])
 - Form::end()
 - Form::input($name, $label = '', $parameters = [])
 - Form::button($text = 'Submit', $parameters = [])

 
#### Types shortcuts
 
 Equal to input() with the "type" parameter
 
 - Form::text() - input() alias
 - Form::password()
 - Form::color()
 - Form::date()
 - Form::datetime()
 - Form::datetimeLocal()
 - Form::email()
 - Form::number()
 - Form::range()
 - Form::search()
 - Form::tel()
 - Form::time()
 - Form::url()
 - Form::month()
 - Form::week()
 