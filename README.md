# HtmlBuilder

**HtmlBuilder** is a user friendly php HtmlGenerator.

### Requirements
* Php 5.6+

### Installation

```
composer require qpdb/html-builder
```

### How do we use?
```php
$jobDeveloperOptions = [
	[
		'2.1' => 'PHP Developer',
		'2.2' => 'C++ Developer',
		'2.3' => 'Java Developer',
		'2.4' => 'JavaScript Developer',
	],
	Html::option()->label( 'Other languages' )->value( '2.9' )
];

$form = Html::form()->encTypeMultipart()->methodPost()
	->withHtmlElement(
		Html::label( 'Full name' )->for( 'full-name' ),
		Html::input()->text()->id( 'full-name' )->name( 'full_name' )->placeholder( 'Your full name' )->value( 'John Doe' ),
		Html::label( 'Your job' )->for( 'job' ),
		Html::select()->id( 'job' )->name('job')->withOptions(
			Html::option()->value( 0 )->label( 'Please select' ),
			Html::option()->value( 1 )->label( 'DevOps' ),
			Html::optgroup()->label('Software developer')->withOptions($jobDeveloperOptions),
			[3 => 'Web design', 4 => 'Game testing']
		)->selectValue( '2.1' ),
		Html::label('Job description')->for('job-description'),
		Html::textarea()->id('job-description')->name('job_description')
	);

Html::div()->withClass( 'class_1', 'class_2' )->id( 'container' )->withHtmlElement( $form )->render();
```

#### Generated html

```html
<div id="container" class="class_1 class_2">
    <form enctype="multipart/form-data" method="post">
        <label for="full-name">Full name</label>
        <input id="full-name" name="full_name" value="John Doe" type="text" placeholder="Your full name">
        <label for="job">Your job</label>
        <select id="job" name="job">
            <option value="0">Please select</option>
            <option value="1">DevOps</option>
            <optgroup label="Software developer">
                <option value="2.1" selected>PHP Developer</option>
                <option value="2.2">C++ Developer</option>
                <option value="2.3">Java Developer</option>
                <option value="2.4">JavaScript Developer</option>
                <option value="2.9">Other languages</option>
            </optgroup>
            <option value="3">Web design</option>
            <option value="4">Game testing</option>
        </select>
        <label for="job-description">Job description</label>
        <textarea id="job-description" name="job_description"></textarea>
    </form>
</div>
```

