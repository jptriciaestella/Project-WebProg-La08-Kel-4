DARI GITHUB file .env hilang, buat .env baru dari .env.example (copas aja)

> Buat database 'indoforum'

di terminal:
> composer update
> php artisan key:generate
> php artisan migrate:fresh --seed
> php artisan storage:link

PENTING!!
> BUAT DI BRANCH BARU
> SEMUA VIEW extends('Component.navbar'), liat contoh view yang udah jadi aja
> BOOTSTRAP 5
> KALO MAU pake QUERY JOIN, jangan nyebut id di view (ambigu, id di table sama), spesifikasiin di controller jadi post_id user_id dll (liat contoh di postcontroller)

TODO:
- Perbaiki view login signup (udah jalan tinggal viewnya)
- Create update delete post (termasuk view page form create post)
- GANTI href di home.blade.php buat tombol add post
- GANTI href di postThumbnail.blade.php buat tombol update delete post
- Create update delete comment (termasuk view create form di postdetail.blade create, Auth.editcomment.blade edit)
- GANTI href di Component.comment.blade.php buat tombol update delete comment
- View editPassword, Controller editPassword (update password ke DB)
- Supaya aman, pas edit/delete post/comment di controller pastiin yang ngedit adalah yang punya post, sisanya redirect home (if post->user_id == Auth::user()->id {edit/delete} else {return redirect home})

DONE:
- Middleware, tinggal diisi routing dalam groupnya
- Login Signup (view belom sesuai figma)
- View Profile (pribadi dan orang lain beserta postingannya)
- View all post
- View post detail & comment

CRUD:
Post: image optional, jadi validation bisa tipe filenya aja (mimes image) gak pake required. Image default udah di migration, no-image.jpg. Kalo kosong gak usah insert. (if request->file('productImage'){ insert DB, ada kolom image } else { insert DB, gak pake kolom image })

MIDDLEWARE: udah dibuat tinggal dimasukkin di web.php, 
Route yang gak di dalem group -> bisa diakses ke publik
Route::middleware('auth') -> cuma bisa diakses member & admin
Route::middleware('member') -> cuma bisa diakses member
Route::middleware('admin') -> cuma bisa diakses admin

CONTROLLER:
> User Controller: Register, Login, Logout

> Post Controller: CRUD Post
	- Show all post: Return view all post
	- Create post page: Return view form create post
	- Create post: Masukkin request create post ke db
	- Edit post page: Return view form edit post
	- Edit post: Update request edit post ke db
	- Delete post
 	- Show detail post: termasuk form comment

> Comment Controller: CRUD Controller
	- Show Form create comment ada di dalam detail post, jadi gak ada.
	- Create comment: push comment ke db
	- Show edit 
	
> Home Controller: Show All Post, pagination & filter

BLADE:
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

kombinasi sendiri, liat di blade yang udah ada.

DELETE POST SENDIRI / ADMIN BISA DELETE POST SEMUA, edit juga sama
@if (Auth::user()->role == 'admin' || $post->user_id == Auth::user()->id)
	<div tombol delete/edit>
@endif

CEK USER UDAH KELOGIN DI VIEW: buat tombol add post, form comment
@guest
    <div yang diliat guest>
@endguest

@auth
    <div yang diliat user (member/admin)>
@endauth