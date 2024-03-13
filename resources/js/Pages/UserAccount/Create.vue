<!-- <template>
    <div class="container">
      <div class="login-box">
        <div class="header-img">
          <img src="https://images.unsplash.com/photo-1554995207-c18c203602cb?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
        </div>
        <div class="header-text">
          <p>Login</p>
        </div>
        <div class="input-group">
          <input type="text" class="input-field" id="username" required>
          <label for="username">Username</label>
        </div>
        <div class="input-group">
          <input type="password" class="input-field" id="password" required>
          <label for="password">Password</label>
        </div>
        <div class="forgot-pass">
          <a href="#">Forgot password?</a>
        </div>
        <div class="input-group">
          <button class="input-submit">Login <i class="bx bx-log-in"></i></button>
        </div>
      </div>
    </div>
  </template>
  
  <style scoped>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
  
    body {
      background: aqua;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
  
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
  
    .login-box {
      position: relative;
      width: 370px;
      height: 450px;
      background: rgb(0, 0, 0, 0.83);
      color: #fff;
      padding: 80px 30px 25px 30px;
      border-radius: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  
    .header-img {
      position: absolute;
      top: 0%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  
    .header-img img {
      width: 100px;
    }
  
    .header-text {
      text-align: center;
      font-size: 24px;
      font-weight: 500;
      margin-bottom: 20px;
    }
  
    .input-group {
      position: relative;
      display: flex;
      flex-direction: column;
    }
  
    .input-field {
      height: 40px;
      background: transparent;
      color: #fff;
      border: 0;
      border-bottom: 1px solid #fff;
      margin: 15px 0;
      padding: 0 15px;
      outline: none;
    }
  
    .input-field:focus, .input-field:valid {
      border-bottom: 2px solid #d1e710;
    }
  
    .input-group label {
      position: absolute;
      top: 23px;
      left: 3px;
      transition: .3s;
    }
  
    .input-field:focus ~ label, .input-field:valid ~ label {
      top: 5px;
      font-size: 12px;
      color: #d1e710;
    }
  
    .forgot-pass {
      text-align: right;
      margin-bottom: 10px;
    }
  
    .forgot-pass a {
      color: #e9f76a;
      font-size: 12px;
    }
  
    .input-submit {
      height: 40px;
      border-radius: 30px;
      border: none;
      background: #d1e710;
      margin-top: 20px;
      cursor: pointer;
      transition: .4s ease-out;
    }
  
    .input-submit:hover {
      box-shadow: 0 1px 10px rgb(254, 201, 26, 0.5);
    }
  </style>
   -->

   <template>

<div class="h-screen flex justify-center items-center pb-60">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="#">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h5>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            </div>
            <div class="flex items-start">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                    </div>
                    <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                </div>
                <a href="#" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
            </div>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
            </div>
        </form>
    </div>
</div>


    <!-- <form @submit.prevent="register">
      <div class="w-1/2 mx-auto">
        <div>
          <label for="name" class="label">Your Name</label>
          <input
            id="name" v-model="form.name" type="text"
            class="input"
          />
          <div v-if="form.errors.name" class="input-error">
            {{
              form.errors.name }}
          </div>
        </div>
        <div class="mt-4">
          <label for="email" class="label">E-mail</label>
          <input
            id="email" v-model="form.email" type="text"
            class="input"
          />
          <div v-if="form.errors.email" class="input-error">
            {{
              form.errors.email }}
          </div>
        </div>
        <div class="mt-4">
          <label for="password" class="label">Password</label>
          <input
            id="password" v-model="form.password"
            type="password" class="input"
          />
          <div
            v-if="form.errors.password"
            class="input-error"
          >
            {{ form.errors.password }}
          </div>
        </div>

        <div class="mt-4">
        <label for="password_confirmation" class="label">Confirm Password</label>
        <input
          id="password_confirmation" v-model="form.password_confirmation"
          type="password" class="input"
        />
      </div>
      <div class="mt-4">
        <button
          class="btn-primary w-full"
          type="submit"
        >
          Create Account
        </button>
      </div>
    </div>
  </form> -->
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
})
const register = () => form.post('/user-account')
</script>
