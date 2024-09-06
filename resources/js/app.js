import "./bootstrap";
import "preline";
import "./preline.min.js";
import "./lodash.min.js";

// Set form: x-data="formSubmit" @submit.prevent="submit" and button: x-ref="btn"
document.addEventListener("alpine:init", () => {
    Alpine.data("formSubmit", () => ({
        submit() {
            this.$refs.btn.disabled = true;
            this.$refs.btn.classList.remove(
                "bg-blue-600",
                "hover:bg-blue-700",
                "focus:bg-blue-700"
            );
            this.$refs.btn.classList.add("bg-blue-400");
            this.$refs.btn.innerHTML = `<span class="absolute left-2 top-1/2 -translate-y-1/2 transform">
                        <i class="fa-solid fa-spinner animate-spin"></i>
                        </span>Please wait...`;
            this.$el.submit();
        },
    }));
});
