<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use JsonException;

/**
 * @mixin Model
 */
trait HasBaseModel
{
  use HasFactory;

  public static function getCacheKey(string $key = null): string
  {
    $base = Str::of(static::class)->snake()->replace('\\_', '.');

    $key = $key ?? 'models';
    $base .= ".{$key}";

    return $base;
  }

  public static function getFromCache(string $key = null, $default = null): mixed
  {
    return Cache::get(self::getCacheKey($key), $default);
  }

  public static function setForeverToCache(string $key, mixed $value): void
  {
    Cache::forever(self::getCacheKey($key), $value);
  }

  public static function getItemsPerPage(): int
  {
    return request()?->input('per_page', 20) ?? 20;
  }

  /**
   * Cast an attribute to a native PHP type.
   *
   * @param  string  $key
   * @param  mixed  $value
   * @return mixed
   */
  protected function castAttribute($key, $value): mixed
  {
    if ($this->getCastType($key) === 'array' && is_null($value)) {
      return [];
    }

    return parent::castAttribute($key, $value);
  }

  /**
   * @param  mixed  $value
   * @return bool|string
   * @throws JsonException
   */
  protected function asJson(mixed $value): bool|string
  {
    return json_encode(
      $value,
      JSON_THROW_ON_ERROR | JSON_UNESCAPED_LINE_TERMINATORS
      | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE
    );
  }
}
