<?php
declare(strict_types=1);

namespace Atournayre\Primitives\Tests\Primitives;

use Atournayre\Primitives\Primitives\StringType;
use PHPUnit\Framework\TestCase;

class StringTypeTest extends TestCase
{
    public function testAppendAddsSuffixToString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->append(' World');
        self::assertEquals('Hello World', $result->value());
    }

    public function testAppendDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->append(' World');
        self::assertEquals('Hello', $string->value());
    }

    public function testAsciiConvertsNonAsciiCharacters(): void
    {
        $string = StringType::of('Héllo');
        $result = $string->ascii();
        self::assertEquals('Hello', $result->value());
    }

    public function testAsciiDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Héllo');
        $string->ascii();
        self::assertEquals('Héllo', $string->value());
    }

    public function testCamelConvertsStringToCamelCase(): void
    {
        $string = StringType::of('hello world');
        $result = $string->camel();
        self::assertEquals('helloWorld', $result->value());
    }

    public function testCamelDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('hello world');
        $string->camel();
        self::assertEquals('hello world', $string->value());
    }

    public function testChunkSplitsStringIntoChunks(): void
    {
        $string = StringType::of('Hello');
        $result = $string->chunk(2);
        self::assertEquals(
            array_map(
                fn ($chunk) => StringType::of($chunk),
                ['He', 'll', 'o']
            ),
            $result
        );
    }

    public function testChunkSplitsStringIntoChunksOfOneByDefault(): void
    {
        $string = StringType::of('Hello');
        $result = $string->chunk();
        self::assertEquals(
            array_map(
                fn ($chunk) => StringType::of($chunk),
                ['H', 'e', 'l', 'l', 'o']
            ),
            $result
        );
    }

    public function testChunkDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->chunk(2);
        self::assertEquals('Hello', $string->value());
    }

    public function testCodePointsAtReturnsCodePoints(): void
    {
        $string = StringType::of('Hello');
        $result = $string->codePointsAt(1);
        self::assertEquals([101], $result);
    }

    public function testCodePointsAtReturnsEmptyArrayWhenOffsetIsOutOfBounds(): void
    {
        $string = StringType::of('Hello');
        $result = $string->codePointsAt(10);
        self::assertEquals([], $result);
    }

    public function testCodePointsAtDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->codePointsAt(1);
        self::assertEquals('Hello', $string->value());
    }

    public function testContainsAnyReturnsTrueWhenNeedleIsFound(): void
    {
        $string = StringType::of('Hello');
        $result = $string->containsAny('ell');
        self::assertTrue($result->isTrue());
    }

    public function testContainsAnyReturnsFalseWhenNeedleIsNotFound(): void
    {
        $string = StringType::of('Hello');
        $result = $string->containsAny('xyz');
        self::assertTrue($result->isFalse());
    }

    public function testContainsAnyReturnsTrueWhenNeedleIsFoundInArray(): void
    {
        $string = StringType::of('Hello');
        $result = $string->containsAny(['xyz', 'ell']);
        self::assertTrue($result->isTrue());
    }

    public function testContainsAnyReturnsFalseWhenNeedleIsNotFoundInArray(): void
    {
        $string = StringType::of('Hello');
        $result = $string->containsAny(['xyz', 'abc']);
        self::assertTrue($result->isFalse());
    }

    public function testContainsAnyDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->containsAny('ell');
        self::assertEquals('Hello', $string->value());
    }

    public function testEndsWithReturnsTrueWhenSuffixIsAtEndOfString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->endsWith('lo');
        self::assertTrue($result->isTrue());
    }

    public function testEndsWithReturnsFalseWhenSuffixIsNotAtEndOfString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->endsWith('He');
        self::assertTrue($result->isFalse());
    }

    public function testEndsWithDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->endsWith('lo');
        self::assertEquals('Hello', $string->value());
    }

    public function testEqualsToReturnsTrueWhenStringsAreEqual(): void
    {
        $string = StringType::of('Hello');
        $result = $string->equalsTo('Hello');
        self::assertTrue($result->isTrue());
    }

    public function testEqualsToReturnsFalseWhenStringsAreNotEqual(): void
    {
        $string = StringType::of('Hello');
        $result = $string->equalsTo('World');
        self::assertTrue($result->isFalse());
    }

    public function testEqualsToDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->equalsTo('Hello');
        self::assertEquals('Hello', $string->value());
    }

    public function testFilterVarReturnsTrueWhenStringIsValid(): void
    {
        $string = StringType::of('email@example.com');
        $result = $string->filterVar(FILTER_VALIDATE_EMAIL);
        self::assertSame('email@example.com', $result->value());
    }

    public function testFilterVarThrowExceptionWhenStringIsInvalid(): void
    {
        self::expectException(\InvalidArgumentException::class);
        $string = StringType::of('email@example');
        $string->filterVar(FILTER_VALIDATE_EMAIL);
    }

    public function testFoldedConvertsStringToFoldedCase(): void
    {
        $string = StringType::of('Hello');
        $result = $string->folded();
        self::assertEquals('hello', $result->value());
    }

    public function testFoldedDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->folded();
        self::assertEquals('Hello', $string->value());
    }

    public function testFoldedConvertsStringToFoldedCaseWithCompatibility(): void
    {
        $string = StringType::of('Hello');
        $result = $string->folded(true);
        self::assertEquals('hello', $result->value());
    }

    public function testFoldedConvertsStringToFoldedCaseWithoutCompatibility(): void
    {
        $string = StringType::of('Hello');
        $result = $string->folded(false);
        self::assertEquals('hello', $result->value());
    }

    public function testFoldedDoesNotChangeOriginalStringWithCompatibility(): void
    {
        $string = StringType::of('Hello');
        $string->folded(true);
        self::assertEquals('Hello', $string->value());
    }

    public function testFoldedDoesNotChangeOriginalStringWithoutCompatibility(): void
    {
        $string = StringType::of('Hello');
        $string->folded(false);
        self::assertEquals('Hello', $string->value());
    }

    public function testIndexOfReturnsPositionOfNeedle(): void
    {
        $string = StringType::of('Hello');
        $result = $string->indexOf('l');
        self::assertEquals(2, $result);
    }

    public function testIndexOfReturnsNullWhenNeedleIsNotFound(): void
    {
        $string = StringType::of('Hello');
        $result = $string->indexOf('x');
        self::assertNull($result);
    }

    public function testIndexOfReturnsPositionOfNeedleAfterOffset(): void
    {
        $string = StringType::of('Hello');
        $result = $string->indexOf('l', 3);
        self::assertEquals(3, $result);
    }

    public function testIndexOfDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->indexOf('l');
        self::assertEquals('Hello', $string->value());
    }

    public function testIndexOfLastReturnsPositionOfLastNeedle(): void
    {
        $string = StringType::of('Hello');
        $result = $string->indexOfLast('l');
        self::assertEquals(3, $result);
    }

    public function testIndexOfLastReturnsNullWhenNeedleIsNotFound(): void
    {
        $string = StringType::of('Hello');
        $result = $string->indexOfLast('x');
        self::assertNull($result);
    }

    public function testIndexOfLastReturnsPositionOfLastNeedleAfterOffset(): void
    {
        $string = StringType::of('Hello');
        $result = $string->indexOfLast('l', 2);
        self::assertEquals(3, $result);
    }

    public function testIndexOfLastDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->indexOfLast('l');
        self::assertEquals('Hello', $string->value());
    }

    public function testJoinConcatenatesStrings(): void
    {
        $string = StringType::of('');
        $result = $string->join(['Hello', 'World']);
        self::assertEquals('HelloWorld', $result->value());
    }

    public function testJoinConcatenatesStringsWithLastGlue(): void
    {
        $string = StringType::of('');
        $result = $string->join(['Hello', 'World'], ' and ');
        self::assertEquals('Hello and World', $result->value());
    }

    public function testJoinDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->join([' ', 'World']);
        self::assertEquals('Hello', $string->value());
    }

    public function testKebabConvertsStringToKebabCase(): void
    {
        $string = StringType::of('hello world');
        $result = $string->kebab();
        self::assertEquals('hello-world', $result->value());
    }

    public function testKebabDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('hello world');
        $string->kebab();
        self::assertEquals('hello world', $string->value());
    }

    public function testLengthReturnsLengthOfString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->length()->intValue();
        self::assertEquals(5, $result);
    }

    /**
     * @throws \Exception
     */
    public function testLengthBetweenReturnsTrueWhenLengthIsBetweenBounds(): void
    {
        $string = StringType::of('Hello');
        $result = $string->lengthIsBetween(1, 10);
        self::assertTrue($result->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testLengthBetweenThrowExceptionWhenLengthIsBetweenBounds(): void
    {
        self::expectException(\InvalidArgumentException::class);
        StringType::of('Hello')
            ->lengthIsBetween(1, 10)
            ->throwIfTrue(new \InvalidArgumentException())
        ;
    }

    /**
     * @throws \Exception
     */
    public function testLengthBetweenThrowExceptionWhenLengthIsNotBetweenBounds(): void
    {
        self::expectException(\InvalidArgumentException::class);
        StringType::of('Hello')
            ->lengthIsBetween(10, 20)
            ->throwIfFalse(new \InvalidArgumentException())
        ;
    }

    /**
     * @throws \Exception
     */
    public function testLengthBetweenReturnsFalseWhenLengthIsNotBetweenBounds(): void
    {
        $string = StringType::of('Hello');
        $result = $string->lengthIsBetween(10, 20);
        self::assertTrue($result->isFalse());
    }

    public function testLowerConvertsStringToLowercase(): void
    {
        $string = StringType::of('Hello');
        $result = $string->lower();
        self::assertEquals('hello', $result->value());
    }

    public function testLowerDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->lower();
        self::assertEquals('Hello', $string->value());
    }

    public function testMatchReturnsMatches(): void
    {
        $string = StringType::of('Hello');
        $result = $string->match('/[a-z]/');
        self::assertEquals(['e'], $result);
    }

    public function testMatchDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->match('/[a-z]/');
        self::assertEquals('Hello', $string->value());
    }

    public function testPadBothPadsStringOnBothSides(): void
    {
        $string = StringType::of('Hello');
        $result = $string->padBoth(10, '-');
        self::assertEquals('--Hello---', $result->value());
    }

    public function testPadBothDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->padBoth(10, '-');
        self::assertEquals('Hello', $string->value());
    }

    public function testPadEndPadsStringAtEnd(): void
    {
        $string = StringType::of('Hello');
        $result = $string->padEnd(10, '-');
        self::assertEquals('Hello-----', $result->value());
    }

    public function testPadEndDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->padEnd(10, '-');
        self::assertEquals('Hello', $string->value());
    }

    public function testPadStartPadsStringAtStart(): void
    {
        $string = StringType::of('Hello');
        $result = $string->padStart(10, '-');
        self::assertEquals('-----Hello', $result->value());
    }

    public function testPadStartDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->padStart(10, '-');
        self::assertEquals('Hello', $string->value());
    }

    public function testPrependAddsPrefixToString(): void
    {
        $string = StringType::of('World');
        $result = $string->prepend('Hello ');
        self::assertEquals('Hello World', $result->value());
    }

    public function testPrependDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('World');
        $string->prepend('Hello ');
        self::assertEquals('World', $string->value());
    }

    public function testRepeatRepeatsString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->repeat(3);
        self::assertEquals('HelloHelloHello', $result->value());
    }

    public function testRepeatDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->repeat(3);
        self::assertEquals('Hello', $string->value());
    }

    public function testReplaceReplacesString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->replace('l', 'r');
        self::assertEquals('Herro', $result->value());
    }

    public function testReplaceDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->replace('l', 'r');
        self::assertEquals('Hello', $string->value());
    }

    public function testReplaceMatchesReplacesMatches(): void
    {
        $string = StringType::of('Hello');
        $result = $string->replaceMatches('/[a-z]/', 'r');
        self::assertEquals('Hrrrr', $result->value());
    }

    public function testReplaceMatchesDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->replaceMatches('/[a-z]/', 'r');
        self::assertEquals('Hello', $string->value());
    }

    public function testReverseReversesString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->reverse();
        self::assertEquals('olleH', $result->value());
    }

    public function testReverseDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->reverse();
        self::assertEquals('Hello', $string->value());
    }

    public function testScreamingKebabConvertsStringToScreamingKebabCase(): void
    {
        $string = StringType::of('hello world');
        $result = $string->screamingKebab();
        self::assertEquals('HELLO-WORLD', $result->value());
    }

    public function testScreamingKebabDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('hello world');
        $string->screamingKebab();
        self::assertEquals('hello world', $string->value());
    }

    public function testScreamingSnakeConvertsStringToScreamingSnakeCase(): void
    {
        $string = StringType::of('hello world');
        $result = $string->screamingSnake();
        self::assertEquals('HELLO_WORLD', $result->value());
    }

    public function testScreamingSnakeDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('hello world');
        $string->screamingSnake();
        self::assertEquals('hello world', $string->value());
    }

    public function testSliceReturnsSliceOfString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->slice(1, 3);
        self::assertEquals('ell', $result->value());
    }

    public function testSliceDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->slice(1, 3);
        self::assertEquals('Hello', $string->value());
    }

    public function testSnakeConvertsStringToSnakeCase(): void
    {
        $string = StringType::of('hello world');
        $result = $string->snake();
        self::assertEquals('hello_world', $result->value());
    }

    public function testSnakeDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('hello world');
        $string->snake();
        self::assertEquals('hello world', $string->value());
    }

    public function testSpliceReplacesPartOfString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->splice('l', 1, 3);
        self::assertEquals('Hlo', $result->value());
    }

    public function testSpliceDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->splice('l', 1, 3);
        self::assertEquals('Hello', $string->value());
    }

    public function testSplitSplitsString(): void
    {
        $string = StringType::of('Hello World');
        $result = $string->split(' ');
        self::assertEquals(
            array_map(
                fn ($chunk) => StringType::of($chunk),
                ['Hello', 'World']
            ),
            $result
        );
    }

    public function testSplitSplitsStringWithLimit(): void
    {
        $string = StringType::of('Hello World');
        $result = $string->split(' ', 2);
        self::assertEquals(
            array_map(
                fn ($chunk) => StringType::of($chunk),
                ['Hello', 'World']
            ),
            $result
        );
    }

    public function testSplitDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello World');
        $string->split(' ');
        self::assertEquals('Hello World', $string->value());
    }

    public function testStartsWithReturnsTrueWhenPrefixIsAtStartOfString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->startsWith('He');
        self::assertTrue($result->isTrue());
    }

    public function testStartsWithReturnsFalseWhenPrefixIsNotAtStartOfString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->startsWith('lo');
        self::assertTrue($result->isFalse());
    }

    public function testStartsWithDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->startsWith('He');
        self::assertEquals('Hello', $string->value());
    }

    public function testTitleConvertsStringToTitleCase(): void
    {
        $string = StringType::of('hello world');
        $result = $string->title(true);
        self::assertEquals('Hello World', $result->value());
    }

    public function testTitleDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('hello world');
        $string->title();
        self::assertEquals('hello world', $string->value());
    }

    public function testTitleConvertsStringToTitleCaseWithAllWords(): void
    {
        $string = StringType::of('hello world');
        $result = $string->title(true);
        self::assertEquals('Hello World', $result->value());
    }

    public function testTitleConvertsStringToTitleCaseWithFirstWord(): void
    {
        $string = StringType::of('hello world');
        $result = $string->title(false);
        self::assertEquals('Hello world', $result->value());
    }

    public function testTitleDoesNotChangeOriginalStringWithAllWords(): void
    {
        $string = StringType::of('hello world');
        $string->title(true);
        self::assertEquals('hello world', $string->value());
    }

    public function testTitleDoesNotChangeOriginalStringWithFirstWord(): void
    {
        $string = StringType::of('hello world');
        $string->title(false);
        self::assertEquals('hello world', $string->value());
    }

    public function testTrimRemovesWhitespace(): void
    {
        $string = StringType::of(' Hello ');
        $result = $string->trim();
        self::assertEquals('Hello', $result->value());
    }

    public function testTrimDoesNotChangeOriginalString(): void
    {
        $string = StringType::of(' Hello ');
        $string->trim();
        self::assertEquals(' Hello ', $string->value());
    }

    public function testTrimRemovesCharacters(): void
    {
        $string = StringType::of('Hello');
        $result = $string->trim('Ho');
        self::assertEquals('ell', $result->value());
    }

    public function testTrimEndRemovesWhitespace(): void
    {
        $string = StringType::of(' Hello ');
        $result = $string->trimEnd();
        self::assertEquals(' Hello', $result->value());
    }

    public function testTrimEndDoesNotChangeOriginalString(): void
    {
        $string = StringType::of(' Hello ');
        $string->trimEnd();
        self::assertEquals(' Hello ', $string->value());
    }

    public function testTrimEndRemovesCharacters(): void
    {
        $string = StringType::of('Hello');
        $result = $string->trimEnd('o');
        self::assertEquals('Hell', $result->value());
    }

    public function testTrimPrefixRemovesPrefix(): void
    {
        $string = StringType::of('Hello');
        $result = $string->trimPrefix('He');
        self::assertEquals('llo', $result->value());
    }

    public function testTrimPrefixDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->trimPrefix('He');
        self::assertEquals('Hello', $string->value());
    }

    public function testTrimStartRemovesWhitespace(): void
    {
        $string = StringType::of(' Hello ');
        $result = $string->trimStart();
        self::assertEquals('Hello ', $result->value());
    }

    public function testTrimStartDoesNotChangeOriginalString(): void
    {
        $string = StringType::of(' Hello ');
        $string->trimStart();
        self::assertEquals(' Hello ', $string->value());
    }

    public function testTrimStartRemovesCharacters(): void
    {
        $string = StringType::of('Hello');
        $result = $string->trimStart('He');
        self::assertEquals('llo', $result->value());
    }

    public function testTrimSuffixRemovesSuffix(): void
    {
        $string = StringType::of('Hello');
        $result = $string->trimSuffix('lo');
        self::assertEquals('Hel', $result->value());
    }

    public function testTrimSuffixDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->trimSuffix('lo');
        self::assertEquals('Hello', $string->value());
    }

    public function testUpperConvertsStringToUppercase(): void
    {
        $string = StringType::of('Hello');
        $result = $string->upper();
        self::assertEquals('HELLO', $result->value());
    }

    public function testUpperDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->upper();
        self::assertEquals('Hello', $string->value());
    }

    public function testValueReturnsString(): void
    {
        $string = StringType::of('Hello');
        self::assertEquals('Hello', $string->value());
    }

    public function testWidthReturnsWidthOfString(): void
    {
        $string = StringType::of('Hello');
        $result = $string->width();
        self::assertEquals(5, $result);
    }

    public function testWidthIgnoresAnsiDecoration(): void
    {
        $string = StringType::of("\033[31mHello\033[0m");
        $result = $string->width();
        self::assertEquals(5, $result);
    }

    public function testWidthDoesNotChangeOriginalString(): void
    {
        $string = StringType::of('Hello');
        $string->width();
        self::assertEquals('Hello', $string->value());
    }

    public function testOfCreatesString(): void
    {
        $string = StringType::of('Hello');
        self::assertInstanceOf(StringType::class, $string);
    }
}
