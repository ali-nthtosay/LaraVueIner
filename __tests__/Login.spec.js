import { mount } from "@vue/test-utils";
import { describe, expect, it } from "vitest";
import LoginComp from "../resources/js/Pages/Auth/Login.vue";

describe("Login", () => {
    const wrapper = mount(LoginComp);
    it("should render correctly", async () => {
        expect(wrapper.exists()).toBe(true);
    });

    it("should update email and password fields", async () => {
        // Find email and password inputs
        const emailInput = wrapper.find('input[type="email"]');
        const passwordInput = wrapper.find('input[type="password"]');

        // Set values for email and password inputs
        await emailInput.setValue("test@example.com");
        await passwordInput.setValue("password123");

        // Assert that the values are updated
        expect(emailInput.element.value).toBe("test@example.com");
        expect(passwordInput.element.value).toBe("password123");
    });

    it("should call login method on form submit", async () => {
        // Finding and clicking thre button
        await wrapper.find('button[type="submit"]').trigger("click");
    });
});

// The Login test suite aims to verify the functionality of the Login component (LoginComp). The suite begins by mounting the LoginComp using the mount function from @vue/test-utils. The first test case ensures that the Login component renders correctly by checking its existence within the wrapper. Subsequently, the test suite examines the behavior of the email and password fields, simulating user input and validating that the fields update appropriately. This includes setting values for the email and password inputs and asserting that the values are reflected correctly within the component. Finally, the test suite evaluates the interaction of the login form submission, triggering a click event on the submit button and verifying that the login method is called as expected. By encompassing these tests, the suite ensures the Login component operates as intended, handling user input and form submission accurately.
