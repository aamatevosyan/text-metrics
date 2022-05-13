from fastapi import FastAPI
from pydantic import BaseModel
from ruts import ReadabilityStats, DiversityStats

app = FastAPI()

def get_results(text):
    result = {}

    rs = ReadabilityStats(text)
    result.update(rs.get_stats())

    ds = DiversityStats(text)
    result.update(ds.get_stats())

    return result


class TextRequest(BaseModel):
    text: str


@app.get("/")
@app.post("/")
def process(request: TextRequest):
    return get_results(request.text)
