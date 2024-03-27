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

// Check if the password is valid:
// This test case aims to verify whether the provided password meets the required criteria for validity. The isPasswordValid function is assessed to ensure it correctly validates the format of the password according to predefined rules. By executing this test, we confirm that the utility function behaves as expected, accurately determining the validity of passwords based on specified criteria.

// Check if the email is valid:
// This test case focuses on determining the validity of a given email address according to standard email format rules. The isValidEmail function is evaluated to validate its ability to accurately assess the correctness of email addresses. Executing this test ensures that the utility function correctly identifies valid email addresses, thereby enhancing the reliability of email-related functionalities in the application.
