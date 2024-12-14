@extends("layouts.layout")


@section('layout')

<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h2>
    <form action="/login" method="POST">
      @CSRF
      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" 
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-900" 
               placeholder="Enter your email" required>
      </div>
      <!-- Password -->
      <div class="mb-6">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" 
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-900" 
               placeholder="Enter your password" required>
      </div>
      
      <!-- Submit Button -->
      <button type="submit" 
              class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
        Login
      </button>
      <div class="mt-4 text-right">
        <p class="text-sm">Do you have don't account? <a class="text-blue-500" href="/register">Register</a></p>
      </div>
    </form>
  </div>



@endsection