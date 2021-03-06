from types import FunctionType
from typing import Callable, List

import matplotlib.pyplot as plt
import numpy as np
from matplotlib.figure import Figure
from matplotlib.patches import Rectangle

from ..diversity_stats import calc_ttr


def fingerprinting(
    texts: List[List[str]],
    segment_len: int = 10,
    metric: Callable = None,
    x_size=800,
    y_size=600,
    cmap="PuOr",
    is_return=True,
) -> Figure:
    """
    Визуализация литературной дактилоскопии (Literature Fingerprinting)

    Ссылки:
        https://www.uni-konstanz.de/mmsp/pubsys/publishedFiles/KeOe07.pdf

    Аргументы:
        texts (list[list[str]]): Список списков слов
        segment_len (int): Размер сегмента
        metric (callable): Функция для подсчета метрики лексического разнообразия
        x_size (int): Ширина области для визуализации
        y_size (int): Высота области для визуализации
        cmap (str): Цветовая карта
        is_return (bool): Возвращать объект Figure

    Вывод:
        fig (Figure): Визуализация литературной дактилоскопии

    Исключения:
        TypeError: Если передаваемое значение не является списком списков
    """
    if not any(isinstance(text, (list, tuple)) for text in texts):
        raise TypeError("Тексты должны быть представлены в виде списка списков слов")
    metrics = {}
    if isinstance(metric, FunctionType):
        metric_func = metric
    else:
        metric_func = calc_ttr
    for i, text in enumerate(texts):
        start = 0
        end = segment_len
        window_len = int(0.1 * segment_len)
        if window_len == 0:
            window_len = 1
        n_words = len(text)
        segments = []
        while end <= n_words:
            segment = text[start:end]
            metric_value = metric_func(segment)
            segments.append(metric_value)
            start += window_len
            end += window_len
        final_segment = text[start:]
        segments.append(metric_func(final_segment))
        metrics[i] = segments

    fig = plt.figure(figsize=(15, 10))
    ax = fig.add_subplot(111)
    ax.axes.get_xaxis().set_visible(False)
    ax.axes.get_yaxis().set_visible(False)
    cmaps = plt.get_cmap(cmap)
    cmap_list = [cmaps(i) for i in range(cmaps.N)]
    cx = ax.imshow(cmap_list, interpolation="nearest", cmap=cmap, visible=None)
    fig.colorbar(cx)
    x = -x_size + 30
    y = y_size - 50
    max_metric = max([max(v) for k, v in metrics.items()])
    n_cols = 0
    n_rows = 0
    for _, segments in metrics.items():
        n_segments = len(segments)
        n_cols = int(n_segments / 8) if (n_segments % 8) == 0 else int(n_segments / 8) + 1
        n_rows = 8 if n_cols > 1 else n_segments
        b = np.zeros((n_rows, n_cols))
        pos = 0
        for i in range(n_rows):
            for j in range(n_cols):
                if pos <= (n_segments - 1):
                    b[i][j] = segments[pos]
                    pos += 1
                else:
                    b[i][j] = 0
        tam_quad = 15
        x_max = x_size - 25
        margin = 25
        x_accum = n_cols * tam_quad
        if (x + x_accum + margin) > x_max:
            y = y - ((8 * tam_quad) + margin)
            x = -x_size + 25
        for i in range(n_rows):
            for j in range(n_cols):
                if b[i][j] == 0:
                    rect = Rectangle((x, y), tam_quad, tam_quad, color="Black")
                    ax.add_patch(rect)
                else:
                    rect = Rectangle((x, y), tam_quad, tam_quad, color=cmaps(b[i][j] / max_metric))
                    ax.add_patch(rect)
                x += tam_quad
            x -= n_cols * tam_quad
            y -= tam_quad
        x += (n_cols * tam_quad) + margin
        y += n_rows * tam_quad
    plt.xlim([-x_size, x_size])
    plt.ylim([-y_size, y_size])
    plt.title("Литературная дактилоскопия")
    if is_return:
        return fig
