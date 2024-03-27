import { render } from "@testing-library/vue";

const MessageComponent = {
    template: "<p>{{ msg }}</p>",
    props: ["Hello, world!"],
};

test("renders properly", async () => {
    const { getByText } = render(MessageComponent);
    expect(getByText("Hello, world!")).toBeInTheDocument();
});
