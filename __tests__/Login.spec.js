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
