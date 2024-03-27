import { expect, test } from "vitest";
import { isPasswordValid, isValidEmail } from "../resources/js/utilities";

const password = "Aasdkjq@23sf";
const email = "example@mail.com";

test("Check Password valid", () => {
    expect(!isPasswordValid(password)).toBe(false);
});

test("Check Email valid", () => {
    expect(!isValidEmail(email)).toBe(false);
});
