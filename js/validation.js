/* =====================================================
   CONTACT FORM — CLIENT-SIDE VALIDATION + AJAX SUBMIT
   ===================================================== */

(function () {
  const form = document.getElementById("contactForm");
  if (!form) return;

  const fields = {
    name: {
      input: document.getElementById("name"),
      error: document.getElementById("nameError"),
      validate: (v) => {
        if (!v.trim()) return "Please enter your name.";
        if (v.trim().length < 2) return "Name looks too short.";
        return "";
      }
    },
    email: {
      input: document.getElementById("email"),
      error: document.getElementById("emailError"),
      validate: (v) => {
        const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!v.trim()) return "Please enter your email.";
        if (!pattern.test(v.trim())) return "Please enter a valid email address.";
        return "";
      }
    },
    subject: {
      input: document.getElementById("subject"),
      error: document.getElementById("subjectError"),
      validate: (v) => {
        if (!v.trim()) return "Please add a subject.";
        return "";
      }
    },
    message: {
      input: document.getElementById("message"),
      error: document.getElementById("messageError"),
      validate: (v) => {
        if (!v.trim()) return "Please write a message.";
        if (v.trim().length < 10) return "Message should be at least 10 characters.";
        return "";
      }
    }
  };

  // Live validation as the user types / leaves a field
  Object.values(fields).forEach(({ input, error, validate }) => {
    input.addEventListener("blur", () => {
      const msg = validate(input.value);
      showFieldError(input, error, msg);
    });
    input.addEventListener("input", () => {
      if (input.closest(".form-group").classList.contains("invalid")) {
        const msg = validate(input.value);
        showFieldError(input, error, msg);
      }
    });
  });

  function showFieldError(input, errorEl, msg) {
    const group = input.closest(".form-group");
    errorEl.textContent = msg;
    group.classList.toggle("invalid", Boolean(msg));
  }

  function validateAll() {
    let valid = true;
    Object.values(fields).forEach(({ input, error, validate }) => {
      const msg = validate(input.value);
      showFieldError(input, error, msg);
      if (msg) valid = false;
    });
    return valid;
  }

  const submitBtn = document.getElementById("submitBtn");
  const btnText = submitBtn.querySelector(".btn-text");
  const btnSpinner = submitBtn.querySelector(".btn-spinner");
  const statusEl = document.getElementById("formStatus");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();
    statusEl.textContent = "";
    statusEl.className = "form-status";

    if (!validateAll()) {
      statusEl.textContent = "Please fix the highlighted fields.";
      statusEl.classList.add("error");
      return;
    }

    setLoading(true);

    try {
      const formData = new FormData(form);
      const response = await fetch(form.action, {
        method: "POST",
        body: formData,
        headers: { "X-Requested-With": "XMLHttpRequest" }
      });

      const result = await response.json().catch(() => null);

      if (response.ok && result && result.success) {
        statusEl.textContent = result.message || "Message sent successfully!";
        statusEl.classList.add("success");
        form.reset();
      } else {
        statusEl.textContent = (result && result.message) || "Something went wrong. Please try again.";
        statusEl.classList.add("error");
      }
    } catch (err) {
      statusEl.textContent = "Network error — please try again later.";
      statusEl.classList.add("error");
    } finally {
      setLoading(false);
    }
  });

  function setLoading(isLoading) {
    submitBtn.disabled = isLoading;
    btnText.textContent = isLoading ? "Sending..." : "Send Message";
    btnSpinner.hidden = !isLoading;
  }
})();
