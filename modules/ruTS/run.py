from ruts import BasicStats
text = "Объем и структура выпускной квалификационной работы (магистерской диссертации). Работа состоит из введения, трех глав, заключения. Работа изложена на 67 страницах, дополнена 4 приложениями, включает 17 рисунков, 7 таблиц, основана на 83 источниках, среди которых нормативно-правовые акты, научные статьи, электронные ресурсы и иные публикации российских авторов."
bs = BasicStats(text)
bs.get_stats()

bs.print_stats()

from ruts import ReadabilityStats
rs = ReadabilityStats(text)
rs.get_stats()

rs.print_stats()

from ruts import DiversityStats
ds = DiversityStats(text)
ds.get_stats()

ds.print_stats()

