import sys, json, argparse
from ruts import ReadabilityStats, DiversityStats

def main(argv):
   parser = argparse.ArgumentParser()
   parser.add_argument("i")
   parser.add_argument("o")
   args = parser.parse_args()

   with open(args.i, 'r', encoding='UTF-8') as f:
       text = f.read()

   result = {}

   rs = ReadabilityStats(text)
   result.update(rs.get_stats())

   ds = DiversityStats(text)
   result.update(ds.get_stats())

   with open(args.o, 'w', encoding='UTF-8') as f:
       json.dump(result, f)

if __name__ == "__main__":
   main(sys.argv[1:])

