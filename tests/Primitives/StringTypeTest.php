<?php
declare(strict_types=1);

namespace Atournayre\Primitives\Tests\Primitives;

use Atournayre\Primitives\Primitives\StringType;
use PHPUnit\Framework\TestCase;

class StringTypeTest extends TestCase
{
    public function testAppendAddsSuffixToString()
    {
        $string = StringType::of('Hello');
        $result = $string->append(' World');
        self::assertEquals('Hello World', $result->value());
    }

    public function testAppendDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->append(' World');
        self::assertEquals('Hello', $string->value());
    }

    public function testAsciiConvertsNonAsciiCharacters()
    {
        $string = StringType::of('Héllo');
        $result = $string->ascii();
        self::assertEquals('Hello', $result->value());
    }

    public function testAsciiDoesNotChangeOriginalString()
    {
        $string = StringType::of('Héllo');
        $string->ascii();
        self::assertEquals('Héllo', $string->value());
    }

    public function testCamelConvertsStringToCamelCase()
    {
        $string = StringType::of('hello world');
        $result = $string->camel();
        self::assertEquals('helloWorld', $result->value());
    }

    public function testCamelDoesNotChangeOriginalString()
    {
        $string = StringType::of('hello world');
        $string->camel();
        self::assertEquals('hello world', $string->value());
    }

    public function testChunkSplitsStringIntoChunks()
    {
        $string = StringType::of('Hello');
        $result = $string->chunk(2);
        self::assertEquals(['He', 'll', 'o'], $result);
    }

    public function testChunkSplitsStringIntoChunksOfOneByDefault()
    {
        $string = StringType::of('Hello');
        $result = $string->chunk();
        self::assertEquals(['H', 'e', 'l', 'l', 'o'], $result);
    }

    public function testChunkDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->chunk(2);
        self::assertEquals('Hello', $string->value());
    }

    public function testCodePointsAtReturnsCodePoints()
    {
        $string = StringType::of('Hello');
        $result = $string->codePointsAt(1);
        self::assertEquals([101], $result);
    }

    public function testCodePointsAtReturnsEmptyArrayWhenOffsetIsOutOfBounds()
    {
        $string = StringType::of('Hello');
        $result = $string->codePointsAt(10);
        self::assertEquals([], $result);
    }

    public function testCodePointsAtDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->codePointsAt(1);
        self::assertEquals('Hello', $string->value());
    }

    public function testContainsAnyReturnsTrueWhenNeedleIsFound()
    {
        $string = StringType::of('Hello');
        $result = $string->containsAny('ell');
        self::assertTrue($result);
    }

    public function testContainsAnyReturnsFalseWhenNeedleIsNotFound()
    {
        $string = StringType::of('Hello');
        $result = $string->containsAny('xyz');
        self::assertFalse($result);
    }

    public function testContainsAnyReturnsTrueWhenNeedleIsFoundInArray()
    {
        $string = StringType::of('Hello');
        $result = $string->containsAny(['xyz', 'ell']);
        self::assertTrue($result);
    }

    public function testContainsAnyReturnsFalseWhenNeedleIsNotFoundInArray()
    {
        $string = StringType::of('Hello');
        $result = $string->containsAny(['xyz', 'abc']);
        self::assertFalse($result);
    }

    public function testContainsAnyDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->containsAny('ell');
        self::assertEquals('Hello', $string->value());
    }

    public function testEndsWithReturnsTrueWhenSuffixIsAtEndOfString()
    {
        $string = StringType::of('Hello');
        $result = $string->endsWith('lo');
        self::assertTrue($result);
    }

    public function testEndsWithReturnsFalseWhenSuffixIsNotAtEndOfString()
    {
        $string = StringType::of('Hello');
        $result = $string->endsWith('He');
        self::assertFalse($result);
    }

    public function testEndsWithDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->endsWith('lo');
        self::assertEquals('Hello', $string->value());
    }

    public function testEqualsToReturnsTrueWhenStringsAreEqual()
    {
        $string = StringType::of('Hello');
        $result = $string->equalsTo('Hello');
        self::assertTrue($result);
    }

    public function testEqualsToReturnsFalseWhenStringsAreNotEqual()
    {
        $string = StringType::of('Hello');
        $result = $string->equalsTo('World');
        self::assertFalse($result);
    }

    public function testEqualsToDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->equalsTo('Hello');
        self::assertEquals('Hello', $string->value());
    }

    public function testFoldedConvertsStringToFoldedCase()
    {
        $string = StringType::of('Hello');
        $result = $string->folded();
        self::assertEquals('hello', $result->value());
    }

    public function testFoldedDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->folded();
        self::assertEquals('Hello', $string->value());
    }

    public function testFoldedConvertsStringToFoldedCaseWithCompatibility()
    {
        $string = StringType::of('Hello');
        $result = $string->folded(true);
        self::assertEquals('hello', $result->value());
    }

    public function testFoldedConvertsStringToFoldedCaseWithoutCompatibility()
    {
        $string = StringType::of('Hello');
        $result = $string->folded(false);
        self::assertEquals('hello', $result->value());
    }

    public function testFoldedDoesNotChangeOriginalStringWithCompatibility()
    {
        $string = StringType::of('Hello');
        $string->folded(true);
        self::assertEquals('Hello', $string->value());
    }

    public function testFoldedDoesNotChangeOriginalStringWithoutCompatibility()
    {
        $string = StringType::of('Hello');
        $string->folded(false);
        self::assertEquals('Hello', $string->value());
    }

    public function testIndexOfReturnsPositionOfNeedle()
    {
        $string = StringType::of('Hello');
        $result = $string->indexOf('l');
        self::assertEquals(2, $result);
    }

    public function testIndexOfReturnsNullWhenNeedleIsNotFound()
    {
        $string = StringType::of('Hello');
        $result = $string->indexOf('x');
        self::assertNull($result);
    }

    public function testIndexOfReturnsPositionOfNeedleAfterOffset()
    {
        $string = StringType::of('Hello');
        $result = $string->indexOf('l', 3);
        self::assertEquals(3, $result);
    }

    public function testIndexOfDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->indexOf('l');
        self::assertEquals('Hello', $string->value());
    }

    public function testIndexOfLastReturnsPositionOfLastNeedle()
    {
        $string = StringType::of('Hello');
        $result = $string->indexOfLast('l');
        self::assertEquals(3, $result);
    }

    public function testIndexOfLastReturnsNullWhenNeedleIsNotFound()
    {
        $string = StringType::of('Hello');
        $result = $string->indexOfLast('x');
        self::assertNull($result);
    }

    public function testIndexOfLastReturnsPositionOfLastNeedleAfterOffset()
    {
        $string = StringType::of('Hello');
        $result = $string->indexOfLast('l', 2);
        self::assertEquals(3, $result);
    }

    public function testIndexOfLastDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->indexOfLast('l');
        self::assertEquals('Hello', $string->value());
    }

    public function testJoinConcatenatesStrings()
    {
        $string = StringType::of('');
        $result = $string->join(['Hello', 'World']);
        self::assertEquals('HelloWorld', $result->value());
    }

    public function testJoinConcatenatesStringsWithLastGlue()
    {
        $string = StringType::of('');
        $result = $string->join(['Hello', 'World'], ' and ');
        self::assertEquals('Hello and World', $result->value());
    }

    public function testJoinDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->join([' ', 'World']);
        self::assertEquals('Hello', $string->value());
    }

    public function testKebabConvertsStringToKebabCase()
    {
        $string = StringType::of('hello world');
        $result = $string->kebab();
        self::assertEquals('hello-world', $result->value());
    }

    public function testKebabDoesNotChangeOriginalString()
    {
        $string = StringType::of('hello world');
        $string->kebab();
        self::assertEquals('hello world', $string->value());
    }

    public function testLengthReturnsLengthOfString()
    {
        $string = StringType::of('Hello');
        $result = $string->length();
        self::assertEquals(5, $result);
    }

    public function testLowerConvertsStringToLowercase()
    {
        $string = StringType::of('Hello');
        $result = $string->lower();
        self::assertEquals('hello', $result->value());
    }

    public function testLowerDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->lower();
        self::assertEquals('Hello', $string->value());
    }

    public function testMatchReturnsMatches()
    {
        $string = StringType::of('Hello');
        $result = $string->match('/[a-z]/');
        self::assertEquals(['e'], $result);
    }

    public function testMatchDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->match('/[a-z]/');
        self::assertEquals('Hello', $string->value());
    }

    public function testPadBothPadsStringOnBothSides()
    {
        $string = StringType::of('Hello');
        $result = $string->padBoth(10, '-');
        self::assertEquals('--Hello---', $result->value());
    }

    public function testPadBothDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->padBoth(10, '-');
        self::assertEquals('Hello', $string->value());
    }

    public function testPadEndPadsStringAtEnd()
    {
        $string = StringType::of('Hello');
        $result = $string->padEnd(10, '-');
        self::assertEquals('Hello-----', $result->value());
    }

    public function testPadEndDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->padEnd(10, '-');
        self::assertEquals('Hello', $string->value());
    }

    public function testPadStartPadsStringAtStart()
    {
        $string = StringType::of('Hello');
        $result = $string->padStart(10, '-');
        self::assertEquals('-----Hello', $result->value());
    }

    public function testPadStartDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->padStart(10, '-');
        self::assertEquals('Hello', $string->value());
    }

    public function testPrependAddsPrefixToString()
    {
        $string = StringType::of('World');
        $result = $string->prepend('Hello ');
        self::assertEquals('Hello World', $result->value());
    }

    public function testPrependDoesNotChangeOriginalString()
    {
        $string = StringType::of('World');
        $string->prepend('Hello ');
        self::assertEquals('World', $string->value());
    }

    public function testRepeatRepeatsString()
    {
        $string = StringType::of('Hello');
        $result = $string->repeat(3);
        self::assertEquals('HelloHelloHello', $result->value());
    }

    public function testRepeatDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->repeat(3);
        self::assertEquals('Hello', $string->value());
    }

    public function testReplaceReplacesString()
    {
        $string = StringType::of('Hello');
        $result = $string->replace('l', 'r');
        self::assertEquals('Herro', $result->value());
    }

    public function testReplaceDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->replace('l', 'r');
        self::assertEquals('Hello', $string->value());
    }

    public function testReplaceMatchesReplacesMatches()
    {
        $string = StringType::of('Hello');
        $result = $string->replaceMatches('/[a-z]/', 'r');
        self::assertEquals('Hrrrr', $result->value());
    }

    public function testReplaceMatchesDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->replaceMatches('/[a-z]/', 'r');
        self::assertEquals('Hello', $string->value());
    }

    public function testReverseReversesString()
    {
        $string = StringType::of('Hello');
        $result = $string->reverse();
        self::assertEquals('olleH', $result->value());
    }

    public function testReverseDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->reverse();
        self::assertEquals('Hello', $string->value());
    }

    public function testScreamingKebabConvertsStringToScreamingKebabCase()
    {
        $string = StringType::of('hello world');
        $result = $string->screamingKebab();
        self::assertEquals('HELLO-WORLD', $result->value());
    }

    public function testScreamingKebabDoesNotChangeOriginalString()
    {
        $string = StringType::of('hello world');
        $string->screamingKebab();
        self::assertEquals('hello world', $string->value());
    }

    public function testScreamingSnakeConvertsStringToScreamingSnakeCase()
    {
        $string = StringType::of('hello world');
        $result = $string->screamingSnake();
        self::assertEquals('HELLO_WORLD', $result->value());
    }

    public function testScreamingSnakeDoesNotChangeOriginalString()
    {
        $string = StringType::of('hello world');
        $string->screamingSnake();
        self::assertEquals('hello world', $string->value());
    }

    public function testSliceReturnsSliceOfString()
    {
        $string = StringType::of('Hello');
        $result = $string->slice(1, 3);
        self::assertEquals('ell', $result->value());
    }

    public function testSliceDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->slice(1, 3);
        self::assertEquals('Hello', $string->value());
    }

    public function testSnakeConvertsStringToSnakeCase()
    {
        $string = StringType::of('hello world');
        $result = $string->snake();
        self::assertEquals('hello_world', $result->value());
    }

    public function testSnakeDoesNotChangeOriginalString()
    {
        $string = StringType::of('hello world');
        $string->snake();
        self::assertEquals('hello world', $string->value());
    }

    public function testSpliceReplacesPartOfString()
    {
        $string = StringType::of('Hello');
        $result = $string->splice('l', 1, 3);
        self::assertEquals('Hlo', $result->value());
    }

    public function testSpliceDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->splice('l', 1, 3);
        self::assertEquals('Hello', $string->value());
    }

    public function testSplitSplitsString()
    {
        $string = StringType::of('Hello World');
        $result = $string->split(' ');
        self::assertEquals(['Hello', 'World'], $result);
    }

    public function testSplitSplitsStringWithLimit()
    {
        $string = StringType::of('Hello World');
        $result = $string->split(' ', 2);
        self::assertEquals(['Hello', 'World'], $result);
    }

    public function testSplitDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello World');
        $string->split(' ');
        self::assertEquals('Hello World', $string->value());
    }

    public function testStartsWithReturnsTrueWhenPrefixIsAtStartOfString()
    {
        $string = StringType::of('Hello');
        $result = $string->startsWith('He');
        self::assertTrue($result);
    }

    public function testStartsWithReturnsFalseWhenPrefixIsNotAtStartOfString()
    {
        $string = StringType::of('Hello');
        $result = $string->startsWith('lo');
        self::assertFalse($result);
    }

    public function testStartsWithDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->startsWith('He');
        self::assertEquals('Hello', $string->value());
    }

    public function testTitleConvertsStringToTitleCase()
    {
        $string = StringType::of('hello world');
        $result = $string->title(true);
        self::assertEquals('Hello World', $result->value());
    }

    public function testTitleDoesNotChangeOriginalString()
    {
        $string = StringType::of('hello world');
        $string->title();
        self::assertEquals('hello world', $string->value());
    }

    public function testTitleConvertsStringToTitleCaseWithAllWords()
    {
        $string = StringType::of('hello world');
        $result = $string->title(true);
        self::assertEquals('Hello World', $result->value());
    }

    public function testTitleConvertsStringToTitleCaseWithFirstWord()
    {
        $string = StringType::of('hello world');
        $result = $string->title(false);
        self::assertEquals('Hello world', $result->value());
    }

    public function testTitleDoesNotChangeOriginalStringWithAllWords()
    {
        $string = StringType::of('hello world');
        $string->title(true);
        self::assertEquals('hello world', $string->value());
    }

    public function testTitleDoesNotChangeOriginalStringWithFirstWord()
    {
        $string = StringType::of('hello world');
        $string->title(false);
        self::assertEquals('hello world', $string->value());
    }

    public function testTrimRemovesWhitespace()
    {
        $string = StringType::of(' Hello ');
        $result = $string->trim();
        self::assertEquals('Hello', $result->value());
    }

    public function testTrimDoesNotChangeOriginalString()
    {
        $string = StringType::of(' Hello ');
        $string->trim();
        self::assertEquals(' Hello ', $string->value());
    }

    public function testTrimRemovesCharacters()
    {
        $string = StringType::of('Hello');
        $result = $string->trim('Ho');
        self::assertEquals('ell', $result->value());
    }

    public function testTrimEndRemovesWhitespace()
    {
        $string = StringType::of(' Hello ');
        $result = $string->trimEnd();
        self::assertEquals(' Hello', $result->value());
    }

    public function testTrimEndDoesNotChangeOriginalString()
    {
        $string = StringType::of(' Hello ');
        $string->trimEnd();
        self::assertEquals(' Hello ', $string->value());
    }

    public function testTrimEndRemovesCharacters()
    {
        $string = StringType::of('Hello');
        $result = $string->trimEnd('o');
        self::assertEquals('Hell', $result->value());
    }

    public function testTrimPrefixRemovesPrefix()
    {
        $string = StringType::of('Hello');
        $result = $string->trimPrefix('He');
        self::assertEquals('llo', $result->value());
    }

    public function testTrimPrefixDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->trimPrefix('He');
        self::assertEquals('Hello', $string->value());
    }

    public function testTrimStartRemovesWhitespace()
    {
        $string = StringType::of(' Hello ');
        $result = $string->trimStart();
        self::assertEquals('Hello ', $result->value());
    }

    public function testTrimStartDoesNotChangeOriginalString()
    {
        $string = StringType::of(' Hello ');
        $string->trimStart();
        self::assertEquals(' Hello ', $string->value());
    }

    public function testTrimStartRemovesCharacters()
    {
        $string = StringType::of('Hello');
        $result = $string->trimStart('He');
        self::assertEquals('llo', $result->value());
    }

    public function testTrimSuffixRemovesSuffix()
    {
        $string = StringType::of('Hello');
        $result = $string->trimSuffix('lo');
        self::assertEquals('Hel', $result->value());
    }

    public function testTrimSuffixDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->trimSuffix('lo');
        self::assertEquals('Hello', $string->value());
    }

    public function testUpperConvertsStringToUppercase()
    {
        $string = StringType::of('Hello');
        $result = $string->upper();
        self::assertEquals('HELLO', $result->value());
    }

    public function testUpperDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->upper();
        self::assertEquals('Hello', $string->value());
    }

    public function testValueReturnsString()
    {
        $string = StringType::of('Hello');
        self::assertEquals('Hello', $string->value());
    }

    public function testWidthReturnsWidthOfString()
    {
        $string = StringType::of('Hello');
        $result = $string->width();
        self::assertEquals(5, $result);
    }

    public function testWidthIgnoresAnsiDecoration()
    {
        $string = StringType::of("\033[31mHello\033[0m");
        $result = $string->width();
        self::assertEquals(5, $result);
    }

    public function testWidthDoesNotChangeOriginalString()
    {
        $string = StringType::of('Hello');
        $string->width();
        self::assertEquals('Hello', $string->value());
    }

    public function testOfCreatesString()
    {
        $string = StringType::of('Hello');
        self::assertInstanceOf(StringType::class, $string);
    }
}
