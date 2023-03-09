# Libmergepdf

[![Packagist Version](https://img.shields.io/packagist/v/Cideale/Libmergepdf.svg?style=flat-square)](https://packagist.org/packages/Cideale/Libmergepdf)

PHP library for merging multiple PDFs.

## Installation

```shell
composer require Cideale/Libmergepdf
```

## Usage

Append the first ten pages of **bar.pdf** to **foo.pdf**:

```php
use Cideale\Libmergepdf\Merger;
use Cideale\Libmergepdf\Pages;

$merger = new Merger;
$merger->addFile('foo.pdf');
$merger->addFile('bar.pdf', new Pages('1-10'));
$createdPdf = $merger->merge();
```

Bulk add files from an iterator:

```php
use Cideale\Libmergepdf\Merger;

$merger = new Merger;
$merger->addIterator(['A.pdf', 'B.pdf']);
$createdPdf = $merger->merge();
```

### Merging pdfs of version 1.5 and later

The default `FPDI` driver is not able handle compressed pdfs of version 1.5 or later.
Circumvent this limitation by using the slightly more experimental `TCPDI` driver.

```php
use Cideale\Libmergepdf\Merger;
use Cideale\Libmergepdf\Driver\TcpdiDriver;

$merger = new Merger(new TcpdiDriver);
```

### Using an immutable merger

Immutability may be achieved by using a `driver` directly.

```php
use Cideale\Libmergepdf\Driver\Fpdi2Driver;
use Cideale\Libmergepdf\Source\FileSource;
use Cideale\Libmergepdf\Pages;

$merger = new Fpdi2Driver;

$createdPdf = $merger->merge(
    new FileSource('foo.pdf'),
    new FileSource('bar.pdf', new Pages('1-10'))
);
```

## Known issues

* Links and other content outside a page content stream is removed at merge.
  This is due to limitations in FPDI and not possible to resolve with the
  current strategy. For more information see [FPDI](https://www.setasign.com/support/faq/fpdi/after-importing-a-page-all-links-are-gone/#question-84).
* _TCPDI_ (as used in the _TcpdiDriver_ for merging pdfs with newer features)
  does not seem to be maintained. This makes mergeing fragile for certain kinds
  of files, and error messages are often all but helpful. This package will not
  be able to fix issues in _TCPDI_. The long term solution is to switch
  to a different backend. Suggestions are very welcomed!
