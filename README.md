          <!-- <td class="py-4 px-6 border-b border-grey-light">
                      @foreach($user->roles as $role)
                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{ $role->name }}</span>
                      @endforeach
                  </td> -->



## Laravel + Tailwind Css Starter Project with Multi-Auth (Admin and Front-end)
- create users 
- create roles and permissions
- assign roles and permissions to user



## How to run the code
- git clone https://github.com/ajayyadavexpo/laravel-starter.git
- cd laravel-starter
- cp .env.example `.env`
- open .env and update DB_DATABASE (database details)
- run : `composer install`
- run : `php artisan key:generate`
- run : `php artisan migrate:fresh --seed`
- run : `php artisan serve`

- Best of luck 


## Credentials
- #### Admin
- email: admin@gmail.com
- password : password
- #### User
- email: user@gmail.com
- password: password
