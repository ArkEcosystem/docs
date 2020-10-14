---
title: Laravel & PHP
---

# Laravel & PHP


<x-alert type="info">
**These guidelines are based on the [Laravel & PHP](https://spatie.be/guidelines/laravel-php) Guidelines by [Spatie](https://spatie.be/) as they provide a solid foundation for modern development.** Our guidelines contain slight modifications that are applicable to how we organise and develop projects in our day-to-day business operations.
</x-alert>

## Formatting

Use [PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) to apply the styleguide guidelines to all files. This ensures consistent formatting across all projects. You can find the configuration in existing projects in the `.php_cs` file that should be the same across all projects.

## Classes

Use the `final` keyword for all classes. This ensures that new developers know what classes can be extended and which not. This will avoid unnecessary inheritance and encourage the use of traits.

Name classes in a way that makes it easy to figure out what they are doing before opening them in an editor, avoid highly technical naming. This ensures that searching for something is easier by using familiar terminology that can be guessed instead of having to know it beforehand. An example would be a controller that is named `ListPostsByUserController` instead of `UserPostsController`.

Both generally imply the same behaviours but the first is more clear by stating that it will list the posts of a given user and makes it possible to filter by `Lists` in your editor to find all controllers that list something instead of having to dig through folders that are full of controllers with generic names that are highly technical.

## Comments

Avoid the use of comments. Your code should be expressive enough to remove the need for further explanation and types should be hinted instead of using comments like `/** @var string */` because they create more noise than they add value.

If you think that a bit of code is so complex that it needs accompanying comments to explain what it does there is most likely a chance for a refactor. Ask another developer to take a look at the code and figure out if you could break down the functionality into multiple functions. A single class where each function has a name that clearly expresses what is happening is often much more expressive than spreading things across multiple classes or keeping them in simple functions outside of classes.

Maybe there altogether is a simpler implementation or an existing package which could be pulled in from [Packagist](https://packagist.org/) to solve the issue at hand and remove the need for the implementation and comments. Always make sure that you check if there already is an existing solution to your problem before you start to reinvent the wheel.

## Controllers

Always use [Single Action Controllers](https://laravel.com/docs/8.x/controllers#single-action-controllers), even when working on REST APIs, where traditionally, [Resource Controllers](https://laravel.com/docs/8.x/controllers#resource-controllers) would be used. Single Action Controllers have expressive names that tell more than a generic controller name with a handful of RESTful named methods. As a result of this tests will also become less noisy because you have separated each endpoint into its own controller that can now be easily tested without the noise of other endpoints in the same file.

Avoid extending the controller that ships with Laravel if you don't need any of the functionality that is provided by the traits that are included in it. If you do need the functionality from a specific trait you should include it directly in the controller that needs it. An exception to this rule is if the vast majority of your controllers need access to the traits that are provided by the controller.

This should rarely be the case because middlewares should be applied either in the `RouteServiceProvider` or inside the route files by using the `middleware` method for specific routes or `group(['middleware' => []])` method to apply the same middleware to multiple endpoints. Validation should be performed by calling `$request->validate()` or using by using [Form Request Validation](https://laravel.com/docs/8.x/validation#form-request-validation) to extract more complex rules and processing out of the controller.

## Database Migrations

You should always avoid the usage of the `down` method in migrations which can be used for database rollbacks. There are several reasons why you should avoid the usage of this method but the primary reason is the loss of data in production. It is quite risky to rollback a production database and more often than not you will lose data and have to apply a database backup which costs even more time.

The `down` methods also make it more difficult to follow the order in which things are applied and what exactly is happening because a single `add_post_id_to_images` migration technically could also be `drop_post_id_to_images` at the same time because it has an `up` and `down` method which add and drop the same column depending on how it is used. Using separate migrations for those tasks makes it more clear what is happening and the `down` method is dead code until you actually need it, which should rarely be the case.

You can listen to https://www.laravelpodcast.com/episodes/5fc5650b for some more info on why the `down` method is a bad idea and shouldn't be used in production applications.

## Testing

Always use [Pest](https://pestphp.com/) for testing of PHP projects. It offers an an expressive API, comparable to [Jest](https://jestjs.io/), and massively reduces the amount of boilerplate that is needed to maintain our test suites. Pest is a relatively new tool that is gaining traction fast, which means you might encounter bugs, so submit a pull request with a fix if you do.

Following the spirit of Pest by keeping things as simple and as minimal as possible you should aim for the same with your tests. Keep them simple and to the point. Break larger tests down into smaller tests that each test specific behaviours instead of writing monolithic 100 line tests that are difficult to bisect and alter.

## Static Analysis

Static Analysis is your best friend when it comes to writing maintainable code. Tools like [PHPStan](https://github.com/phpstan/phpstan), [Larastan](https://github.com/nunomaduro/larastan), [Pslam](https://psalm.dev/) and [Rector](https://github.com/rectorphp/rector) will help you discover bugs, inconsistent code or even missing classes and functions before you even run your application.

These tools should always be used with their most strict configurations. This ensures that the code stays maintainable and makes use of the latest PHP features and best practices for the version that we are currently using. For older projects the introduction of those tools will mean a migration over time to resolve all of the issues that get reported. Every developer should resolve a few of the issues reported by those tools when he has a few minutes time for it.

Do keep in mind that some issues might be false-positives because things like [Facades](https://laravel.com/docs/8.x/facades) require additional type hints and comments in your code so that these tools can understand what the underlying binding of a facade is doing. A few of the aforementioned tools have plugins for Laravel that try to solve this issue but you might still occasionally end up with false-positives.

## Front-End Interactions

If you need interactivity for certain functionality or want to avoid page reloads you should use [Laravel Livewire](https://laravel-livewire.com/) and [Alpine.js](https://github.com/alpinejs/alpine). Livewire allows you to seamlessly integrate with the back-end without having to build a separate API for communication with the back-end. Alpine provides you with an expressive API to manipulate the DOM without having to pull in heavyweights like [Vue](https://vuejs.org/) or [React](https://reactjs.org/).

If you find yourself in a situation where you think Livewire or Alpine are insufficient you should make your case for why you think it is necessary to use a different solution or framework for the task at hand.

## Livewire

### Rendering

Livewire can automatically determine the view that should be used. This means that you should generally omit the `render` method and let Livewire figure out what should be rendered. This means less code to think about and no room for human error in referencing a wrong view.

If you are working on a project that makes use of DDD you will either have to keep the render method because of the way that Livewire resolves the view location or overwrite the method that resolves the view location to only take the class name into account instead of the FQCN of the component. Overriding the resolution method is recommended if a large number of components are used.

### State Management

When working with Livewire you will work a lot with models and their array representations or small bits of data from them that you will need to update. All of this data should be looked at as the state of the component and be stored in a `$state` array that will hold all of the values that are modified on the component. An exception to this rule are models that are passed to the `mount` method because these models will not be modified directly, they only are modified through updates that are using the state data.

#### Good

```php
namespace App\Http\Livewire;

use Livewire\Component;

class UpdateUserNameForm extends Component
{
    public User $user;
    public array $state = [];

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->state = ['name' => $user->name];
    }
}
```

#### Bad

```php
namespace App\Http\Livewire;

use Livewire\Component;

class UpdateUserNameForm extends Component
{
    public User $user;
    public string $name;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
    }
}
```

### Validation

Always ensure to apply validation before performing an action that makes use of component state. This validation can be either performed in real-time or at the time of a method call. If a method is being executed based on events or instant feedback is executed it is recommended to use real-time validation for faster feedback for an improved UX.
