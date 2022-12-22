DARI GITHUB file .env hilang, buat .env baru dari .env.example (copas aja)

> Buat database 'indoforum'

di terminal:
> composer update
> php artisan key:generate
> php artisan migrate:fresh --seed
> php artisan storage:link

PENTING!!
> BUAT DI BRANCH BARU
> Sebelum push delete storage link di public/storage\

CRUD:
User: yang register cuma bisa member. Role user udah default di migration, pas registrasi role kosongin aja

Post: image optional, jadi validation bisa tipe filenya aja (mimes image). Image default udah di migration, no-image.jpg. Kalo kosong gak usah insert. (if request->file('productImage'){ insert DB, ada kolom image } else { insert DB, gak pake kolom image })

MIDDLEWARE: udah dibuat tinggal dimasukkin di web.php, 
Route yang gak di dalem group -> bisa diakses ke publik
Route::middleware('auth') -> cuma bisa diakses member & admin
Route::middleware('member') -> cuma bisa diakses member
Route::middleware('admin') -> cuma bisa diakses admin

NAMPILIN MENU/TOMBOL ADMIN DAN MEMBER YANG BEDA TAPI ADA DALAM SATU VIEW
di viewnya:
@if (Auth::user()->role == 'admin')
	<div yang cuma boleh diliat admin>
@endif

@if (Auth::user()->role == 'member')
	<div yang cuma boleh diliat member>
@endif

atau

@if (Auth::user()->role == 'member')
	<div yang cuma boleh diliat member>
@else
	<div yang diliat oleh SELAIN member>
@endif

kombinasi sendiri.

CEK USER UDAH KELOGIN DI VIEW: buat tombol add post, form comment
@guest
    <div yang diliat guest>
@endguest

@auth
    <div yang diliat user (member/admin)>
@endauth

CONTROLLER:
> User Controller: Register, Login, Logout

> Post Controller: CRUD Post
	- Show all post: Return view all post
	- Create post page: Return view form create post
	- Create post: Masukkin request create post ke db
	- Edit post page: Return view form edit post
	- Edit post: Update request edit post ke db
	- Delete
 	- Show detail post: Return view detail post (dengan form comment dalem view ini)
		return view('postdetail', compact('book', 'user'))

> Comment Controller: CRUD Controller
	- Show Form create comment ada di dalam detail post, jadi tinggal ke DB aja.
	
> Home Controller: Show All Post, pagination & filter


