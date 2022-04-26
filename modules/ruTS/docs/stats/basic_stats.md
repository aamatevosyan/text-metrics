# Базовые статистики

!!! info ""
    **ruts.basic_stats.BasicStats**

## Описание

Модуль для вычисления основных текстовых статистик. В качестве источника данных может использоваться как непосредственно текст, так и объект класса `Doc` библиотеки [spaCy](https://github.com/explosion/spaCy).

В модуле реализована возможность использования предварительно созданных объектов классов [`SentsExtractor`](../extractors/sentences.md) и [`WordsExtractor`](../extractors/words.md) для проведения необходимой токенизации предложений и слов перед вычислением статистик.

!!! note "Примечание"
    Вычисление статистик происходит в момент инициализации объекта класса `BasicStats`.

## Параметры

| Параметр | Тип | По умолчанию | Описание |
| :------: | :-: | :----------: | :------: |
| `source` | str/Doc | `-` | Источник данных (строка или объект Doc) |
| `sents_extractor` | SentsExtractor | `None` | Инструмент для извлечения предложений |
| `words_extractor` | WordsExtractor | `None` | Инструмент для извлечения слов |
| `normalize` | bool | `False` | Вычислять нормализованные статистики |

## Атрибуты

| Атрибут | Тип | Описание |
| :-----: | :-: | :------: |
| `c_letters` | dict[int, int] | Распределение слов по количеству букв |
| `c_syllables` | dict[int, int] | Распределение слов по количеству слогов |
| `n_sents` | int | Количество предложений |
| `n_words` | int | Количество слов |
| `n_unique_words` | int | Количество уникальных слов |
| `n_long_words` | int | Количество длинных слов |
| `n_complex_words` | int | Количество сложных слов |
| `n_simple_words` | int | Количество простых слов |
| `n_monosyllable_words` | int | Количество односложных слов |
| `n_polysyllable_words` | int | Количество многосложных слов |
| `n_chars` | int | Количество символов |
| `n_letters` | int | Количество букв |
| `n_spaces` | int | Количество пробелов |
| `n_syllables` | int | Количество слогов |
| `n_punctuations` | int | Количество знаков препинания |
| `p_unique_words` | float | Нормализованное количество уникальных слов |
| `p_long_words` | float | Нормализованное количество длинных слов |
| `p_complex_words` | float | Нормализованное количество сложных слов |
| `p_simple_words` | float | Нормализованное количество простых слов |
| `p_monosyllable_words` | float | Нормализованное количество односложных слов |
| `p_polysyllable_words` | float | Нормализованное количество многосложных слов |
| `p_letters` | float | Нормализованное количество букв |
| `p_spaces` | float | Нормализованное количество пробелов |
| `p_punctuations` | float | Нормализованное количество знаков препинания |

!!! warning "Предупреждение"
    Атрибуты с нормализованными статистиками `p_*` доступны только при инициализации объекта с параметром `normalize=True`.

## Методы

### get_stats

Возвращает справочник с вычисленными текстовыми статистиками.

Рассмотрим пример вычисления базовых текстовых статистик с использованием нормализации:

!!! example "Пример"

    _Код_:

    ``` python
    # Загрузка библиотек
    from ruts import BasicStats

    # Подготовка данных
    text = "Существуют три вида лжи: ложь, наглая ложь и статистика"

    # Вычисление статистик
    bs = BasicStats(
        text,
        normalize=True
    )
    bs.get_stats()
    ```

    _Результат_:

    ``` bash
    {'c_letters': {1: 1, 3: 2, 4: 3, 6: 1, 10: 2},
    'c_syllables': {1: 5, 2: 1, 3: 1, 4: 2},
    'n_chars': 55,
    'n_complex_words': 2,
    'n_letters': 45,
    'n_long_words': 3,
    'n_monosyllable_words': 5,
    'n_polysyllable_words': 4,
    'n_punctuations': 2,
    'n_sents': 1,
    'n_simple_words': 7,
    'n_spaces': 8,
    'n_syllables': 18,
    'n_unique_words': 8,
    'n_words': 9,
    'p_complex_words': 0.2222222222222222,
    'p_letters': 0.8181818181818182,
    'p_long_words': 0.3333333333333333,
    'p_monosyllable_words': 0.5555555555555556,
    'p_polysyllable_words': 0.4444444444444444,
    'p_punctuations': 0.03636363636363636,
    'p_simple_words': 0.7777777777777778,
    'p_spaces': 0.14545454545454545,
    'p_unique_words': 0.8888888888888888}
    ```

### print_stats

Выводит на экран таблицу с вычисленными текстовыми статистиками.

Для иллюстрации работы метода воспользуемся кодом из предыдущего примера:

!!! example "Пример"

    _Код_:

    ``` python
    ...
    
    # Отображение таблицы вычисленных статистик
    bs.print_stats()
    ```

    _Результат_:

    ``` bash
         Статистика     | Значение 
    ------------------------------
    Предложения         |    1     
    Слова               |    9     
    Уникальные слова    |    8     
    Длинные слова       |    3     
    Сложные слова       |    2     
    Простые слова       |    7     
    Односложные слова   |    5     
    Многосложные слова  |    4     
    Символы             |    55    
    Буквы               |    45    
    Пробелы             |    8     
    Слоги               |    18    
    Знаки препинания    |    2     
    ```

!!! warning "Предупреждение"
    Метод не отображает атрибуты нормализованных статистик `p_*`.