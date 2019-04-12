<?php


namespace Qpdb\Tests\Elements\Div\GithubSample;


use PHPUnit\Framework\TestCase;
use Qpdb\Common\Exceptions\CommonException;
use Qpdb\HtmlBuilder\Exceptions\HtmlBuilderException;
use Qpdb\HtmlBuilder\Html;
use Qpdb\Tests\Strings;

class Test extends TestCase
{
    /**
     * @test
     * @throws HtmlBuilderException
     * @throws CommonException
     */
    public function createSampleDivFromGithub() {
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

        $div = Html::div()->withClass( 'class_1', 'class_2' )->id( 'container' )->withHtmlElement( $form );

        $actual = $div->getMarkup();
        $expected = file_get_contents(__DIR__ . '/expected-input.txt');

        self::assertEquals(Strings::removeAllSpacesFromString($expected), Strings::removeAllSpacesFromString($actual));
    }
}