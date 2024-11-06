from openai import OpenAI
from pydantic import BaseModel
from dotenv import load_dotenv
import os
import json

load_dotenv()

class Recipe(BaseModel):

    title: str
    ingredients: list[str]
    instructions: list[str]
    prep_time: float
    cook_time: float

class RecipeAI:

    FORMAT = {
        "title": "Recipe Title",
        "ingredients": ["Ingredient 1", "Ingredient 2"],
        "instructions": ["Step 1", "Step 2"],
        "prep_time": "Preparation time in minutes",
        "cook_time": "Cooking time in minutes"
    }

    def __init__(self) -> None:
        self._client = OpenAI(api_key=os.getenv("API_KEY"))



    @property
    def _intro(self) -> str:
        intro = f"Format the output as JSON with the " \
                f"following fields: {json.dumps(self.FORMAT)}"
        return intro

    def generate(self, prompt: str) -> Recipe:
        input_prompt = f"Generate recipe based on user needs: {prompt}."
        messages = [
            {"role": "system", "content": f"You are a recipe generator. {self._intro}"},
            {"role": "user", "content": input_prompt}
        ]

        completion = self._client.beta.chat.completions.parse(
            model="gpt-4o-mini",
            messages=messages,
            response_format=Recipe,
        )

        return completion.choices[0].message.parsed

