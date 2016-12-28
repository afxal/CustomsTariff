# Maldives CustomsTariff
[![Build Status](https://travis-ci.org/afxal/CustomsTariff.svg?branch=master)](https://travis-ci.org/afxal/CustomsTariff)

Maldives Customs tariff data query library using [http://customs.gov.mv/SearchTariff](http://customs.gov.mv/SearchTariff)

### Installation

```sh
$ composer require apo/customs-tariff
```


### Usage

```php
    $ct =  new CustomsTariff('food');
    $ct->getList();
```

```php
    $ct =  new CustomsTariff();
    $ct->search('almond');
    $ct->toJson();
```

```php
    $ct =  new CustomsTariff();
    $ct->search('tuna');
    $ct->setLimit(10)
    $ct->toJson();
```

```php
    $ct =  new CustomsTariff();
    $ct->findCode('0302310000');
    $ct->toJson();
```