# String

This library provides a `StringType` class to manipulate strings.

- `of(value: string): StringType`
- `append(...suffix: string): StringType`
- `ascii([rules: Closure[]|string[]|Transliterator[] = [...]]): StringType`
- `camel(): StringType`
- `chunk([length: int = 1]): StringType[]`
- `codePointsAt(offset: int): int[]`
- `containsAny(needle: string|string[]): BoolEnum`
- `endsWith(suffix: iterable|string|string[]): BoolEnum`
- `equalsTo(string: iterable|string|string[]): BoolEnum`
- `filterVar([filter: int = FILTER_DEFAULT], [options: mixed|null = null]): StringType`
- `folded([compat: bool = true]): StringType`
- `indexOf(needle: iterable|string|string[], [offset: int = 0]): int|null`
- `indexOfLast(needle: iterable|string|string[], [offset: int = 0]): int|null`
- `join(strings: array, [lastGlue: null|string = null]): StringType`
- `kebab(): StringType`
- `length(): Numeric`
- `lengthIsBetween(start: int, end: int): BoolEnum`
- `lower(): StringType`
- `match(regexp: string, [flags: int = 0], [offset: int = 0]): array`
- `normalize([form: int = self::NFC]): StringType`
- `padBoth(length: int, [padStr: string = ' ']): StringType`
- `padEnd(length: int, [padStr: string = ' ']): StringType`
- `padStart(length: int, [padStr: string = ' ']): StringType`
- `prepend(...prefix: string): StringType`
- `repeat(multiplier: int): StringType`
- `replace(from: string, to: string): StringType`
- `replaceMatches(fromRegexp: string, to: callable|string): StringType`
- `reverse(): StringType`
- `screamingKebab(): StringType`
- `screamingSnake(): StringType`
- `slice([start: int = 0], [length: int|null = null]): StringType`
- `snake(): StringType`
- `splice(replacement: string, [start: int = 0], [length: int|null = null]): StringType`
- `split(delimiter: string, [limit: int|null = null], [flags: int|null = null]): StringType[]`
- `startsWith(prefix: string|string[]): BoolEnum`
- `title([allWords: bool = false]): StringType`
- `trim([chars: string = " \t\n\r\0\x0B\x0C\u...]): StringType`
- `trimEnd([chars: string = " \t\n\r\0\x0B\x0C\u...]): StringType`
- `trimPrefix(prefix: string|string[]): StringType`
- `trimStart([chars: string = " \t\n\r\0\x0B\x0C\u...]): StringType`
- `trimSuffix(suffix: string|string[]): StringType`
- `upper(): StringType`
- `value(): string`
- `width([ignoreAnsiDecoration: bool = true]): Numeric`
- `__toString(): string`

# Others string types
- Domain
- EmailAddress
- EmailLocalPart
