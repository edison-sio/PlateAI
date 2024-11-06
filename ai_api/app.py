from fastapi import FastAPI
from pydantic import BaseModel
from typing import List, Dict

from recipe import Recipe, RecipeAI

app = FastAPI()

recipe_generator = RecipeAI()

@app.get("/api/recipe", response_model=Recipe)
def generate_recipe(search: str) -> Recipe:
    recipe = recipe_generator.generate(search)
    return recipe

if __name__ == "__main__":
    import uvicorn
    uvicorn.run(app, host="127.0.0.1", port=8080)
