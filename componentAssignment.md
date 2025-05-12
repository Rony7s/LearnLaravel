# 🎓 Tailwind CSS + Laravel Blade Component Demo Assignment

This markdown file demonstrates how to structure a Laravel Blade project that includes custom components to display student cards with Tailwind CSS.

---

## 🧰 Install Tailwind CSS

Run the following command in your terminal to install Tailwind and Vite:

```bash
npm install tailwindcss @tailwindcss/vite
```

---

## 🖥️ Basic Blade Layout - `app.blade.php`

```blade
<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>
  <body>
    <h1 class="text-3xl font-bold underline">
      Hello world!
    </h1>
  </body>
</html>
```

---

## 📁 Step 1: Add Route in `web.php`

Add the following route to your `routes/web.php` file to return the view named `students`:

```php
Route::get('/students', function(){
    return view("students");
});
```

---

## 🧩 Step 2: Create Component File - `components/student-card.blade.php`

This Blade component will be used to render individual student cards with dynamic data:

```blade
<div {{ $attributes->merge(['class' => 'border border-gray-300 p-2 text-center inline-block mb-4 w-full sm:w-1/3 lg:w-1/5']) }}>
    <img src="{{ $image }}" alt="{{ $name }}"
        class="h-48 w-48 rounded-full border-4 border-[#cedeef] mb-2 mx-auto object-cover">
    
    <h3 class="text-2xl leading-8 uppercase text-[#ff004f] font-semibold">{{ $name }}</h3>
    <p class="text-base leading-5 text-gray-700">{{ $title ?? 'Student' }}</p>
    <p class="text-sm leading-5 text-gray-600">Student ID: {{ $studentId }}</p>
    <p class="text-sm leading-5 text-gray-600">Home: {{ $division ?? 'N/A' }}</p>
    <p class="text-sm leading-5 text-gray-600">Blood Group: {{ $bloodGroup ?? 'N/A' }}</p>

    <a href="{{ $contactUrl ?? '#' }}"
        class="text-base bg-[#3E50B4] text-white mx-auto mt-2 px-4 py-1.5 rounded-md block w-max hover:text-black hover:bg-blue-700 transition">
        Contact
    </a>
</div>
```

---

## 🧾 Step 3: Create View File - `resources/views/students.blade.php`

Now, use the component inside the `students.blade.php` view. You can render it multiple times with different data or the same data for demo purposes.

```blade
<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>
  <body>
    <p>This is for class 6</p>
    <br><br>

    <x-student-card
      image="https://avatars.githubusercontent.com/u/30334499?v=4"
      name="Rony Ahmmed"
      title="B.Sc.(Engg) in EdTE"
      studentId="x0007"
      division="Rajshahi"
      bloodGroup="A+"
      contactUrl="mailto:rony@example.com"
    />

    <!-- Repeated for demonstration -->
    <x-student-card
      image="https://avatars.githubusercontent.com/u/30334499?v=4"
      name="Rony Ahmmed"
      title="B.Sc.(Engg) in EdTE"
      studentId="x0007"
      division="Rajshahi"
      bloodGroup="A+"
      contactUrl="mailto:rony@example.com"
    />

    <x-student-card
      image="https://avatars.githubusercontent.com/u/30334499?v=4"
      name="Rony Ahmmed"
      title="B.Sc.(Engg) in EdTE"
      studentId="x0007"
      division="Rajshahi"
      bloodGroup="A+"
      contactUrl="mailto:rony@example.com"
    />
  </body>
</html>
```

---

## 🚀 Run Development Server

To start the Vite development server, use:

```bash
npm run dev
```

To start the Laravel local server, use:

```bash
php artisan serve
```

---

## ✅ Summary

- Tailwind CSS is installed using npm.
- A Blade component is created to display student cards.
- The view renders multiple instances of the component.
- Development and Laravel servers are run with simple terminal commands.

This approach helps you build a clean, reusable, and scalable component-based Blade structure for your Laravel application.
