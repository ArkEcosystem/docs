---
title: Frontend Frameworks
---

# Frontend Frameworks

<x-alert type="info">
These guidelines apply to our general frontend stack (css, html, svg, js) and the frameworks we use for that to make our lives easier. **Note that some of these rules might be superseded by project-specific rules depending on the used framework (e.g. React).**
</x-alert>

## CSS

We make use of [TailwindCSS](https://tailwindcss.com/) to keep our lives easier, and to increase the speed at which our frontend components can be created.

### Tailwind in Views

Generally we try to make use of Tailwind classes in the views where they are needed. If you see that a specific pattern of classes is reused multiple times, there's usually one of two changes you _should_ make:

1. Check if the reused classes indicate duplicated elements being used in the view or across different views. If this is the case, it's often a good practice to move this to a reusable component as that will make it easier to maintain and it will remove the duplication. For more information on how to create these components, see the [HTML / Blade](#html-blade) section further down.
2. There's a need for similar styles but they are not for duplicated elements or there is a reason why moving it to a separate component is unwanted. If this is the case, it's advised to move the Tailwind classes to an actual css class that you can then use on the element instead. For example if you have a `border-t-2 border-theme-secondary-300 border-dashed` combination that you use often, consider moving it to a class called `dashed-top-border`. The advantage is that it will be easier to keep the project consistent if there is ever a change in how all of the dashed lines should look.

### CSS Classes

When you are making use of a `.css` file in which you define classes, there are a few things to note:

- We use `kebab-case` for our css classes (although this might be overruled when developing a React application and using component-based styling).
Make your css selectors specific and not too global. This means that if you need a class that should only be used in a certain setting, the name of the class should be specific enough to make that clear, but you should also make the css selectors as specific as possible. For example, if a heading is only needed for articles, you should call it `article .article-heading`, assuming you have an `article` parent element. This way there will be less chance of interfering with 3rd party extensions and accidental clashes in our own codebase.
- Use Tailwind classes inside the css file as much as possible. There's an `@apply` directive for a reason. Only diverge to raw css when there is no equivalent in Tailwind.
- Split up the classes in the file by their use. If you have a few styles that are focused on tables, keep them grouped together so it's easier to find them. If you see that your css file becomes too large, consider splitting them up into separate files where you can make logical groupings (e.g. a `_table.css` and `_general.css` file).

### Dark Mode

Most of our product come with a native dark mode. This is achieved by utilizing a `:dark` directive in Tailwind, and setting a `.theme-dark` class on the `div` that wraps the project's content. Keep this in mind when developing components that will be reused throughout projects, as they will likely need support for a dark variant of it. You can find a setup for this directive in our [frontend](https://github.com/ArkEcosystem/laravel-ui) repository.

### Formatting

Make use of [RustyWind](https://github.com/avencera/rustywind) to ensure that used Tailwind classes are ordered in a specific format. This will make it easier to find classes when a lot are used on a component as it provides a consistent syntax throughout all projects. In addition it also removes duplicate classes that you might have overlooked to keep it all tidy.

## HTML / Blade

When using Laravel, you write views in Blade files. The rules for this are pretty simple: think in components. If you are working on a page, think about logical ways to split that page into components and create different blade files for each of them to be included in the main page layout. Keep pages tidy, long lines make it hard to read so splitting up attributes across multiple lines can help with readability.

For example, a homepage could look like this:

```Blade
&commat;component('layouts.app')

    &commat;section('content')
        &lt;x-home.documentation
            :title="trans('pages.home.documentation')"
            :documentations="$documentations"
        /&gt;

        &lt;x-horizontal-divider /&gt;

        &lt;x-home.quick-access :documentations="$documentationsQuick" /&gt;

        &lt;x-horizontal-divider /&gt;

        &lt;x-home.tutorials
            :tutorials="$tutorials"
            :featured="$featured"
        /&gt;
    &commat;endsection

&commat;endcomponent
```

By utilizing this approach, you keep the page layout itself simple, structured and easy to extend. It also allows to build new pages with ease by already having isolated components to work with. With Laravel it's quick to create a new component, as you will only have to create a file inside the `views/components` directory and you can immediately use it in your views with the `x-component-name` notation.

Keep components organized by grouping them together based on their use. In the example above you'll notice that the components are all prepended with `x-home`, indicating that these components are homepage-specific. Once you run into components that are being reused in multiple locations, we generally have a `general` folder to put them in, or have them live in the root of the `components` folder.

<x-alert type="info">
    Although possible, refrain from using `@ php` inside of blade templates. This usually indicates a need for a value that should have been passed to you from a controller or Livewire component!
</x-alert>

## SVG

We have plenty of icons that are used, and we prefer to make use of SVGs on webpages due to them always looking crisp on any screen resolution. Existing icons will all work out of the box by using the `@ svg` directive that's available in our projects, but when you get supplied a new icon or SVG image there are a few preparations needed before they can be used:

1. Minimize / optimize the SVGs (we have [SVGO](https://github.com/svg/svgo) workflows for this in the repo). The SVG you receive is likely exported from Illustrator or a similar program and will contain a lot of unneeded metadata. Make sure to optimize the SVG to get rid of this, and this will usually rewrite the SVGs into a format that's better suited for webpage usage too (see point 2 for more on this).
2. Once minimized, check the source of the SVG for any remaining `style` attributes. If present, these styles make use of generic ids like `st0`, but these will be reused across different SVGs. As a result, if you would make use of this SVG in its current state and have another on the same page that references the same id, their styles will clash. Therefore you should rewrite these ids to something unique; usually the name of the file followed by `-st0` will do. Alternatively you can open the icon in Adobe Illustrator and save it again, but with inline styles. Then the class styling should be removed and there is no risk of interference.
3. When working with icons, make sure the code does not reference hardcoded color values but makes use of `currentColor` instead. This will allow us to set the colors to our liking when using them in the views.

## Alpine.js

We make use of [Alpine.js](https://github.com/alpinejs/alpine) in addition to Livewire / Laravel to handle behavior that we cannot produce otherwise, like dropdowns. When making use of alpine, keep it simple. Generally you only need one or two states to keep track of in `x-data` to get the desired frontend behavior. If you seem to need more than that, please rethink if you really need alpine for everything you are trying to do or if (part of) it can be delegated to a Livewire component instead. In the rare case where you do need more than a few properties and methods, consider moving it to a separate `.js` file and referencing that in `x-data`.

## React

{{-- **TBD** --}}
