from math import ceil

import stanza
from fastapi import FastAPI
from pydantic import BaseModel

app = FastAPI()

nlp = stanza.Pipeline(lang='ru', processors='tokenize,pos,lemma', dir='./stanza_resources')


def get_score(text):
    annotated = nlp(text)

    sentences = []

    for i, sentence in enumerate(annotated.sentences):
        nouns = []
        for word in sentence.words:
            if word.upos == 'NOUN':
                nouns.append(word.lemma)
        sentences.append(set(nouns))

    if len(sentences) <= 1:
        return 1

    results = []

    for i in range(0, len(sentences) - 1):
        a = sentences[i]
        b = sentences[i + 1]

        if a & b:
            results.append(1)
        else:
            results.append(0)

    avg = sum(results) / len(results)

    return ceil(avg)


class TextRequest(BaseModel):
    text: str


@app.get("/")
@app.post("/")
def process(request: TextRequest):
    return {"cohesion": get_score(request.text)}
