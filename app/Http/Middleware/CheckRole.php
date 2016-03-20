<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $nurseRoutes = [
            'patient'=> ['all'=>'all','view'=>'view','create'=>'create','register'=>'register','edit'=>'edit','update'=>'update']
        ];

        $doctorsRoutes = [
            // 'patient'=>['all'=>'all','view'=>'view'],
            'patient'=> $nurseRoutes['patient'],
            'consultations'=>['index'=>'all','show'=>'view','create'=>'create','store'=>'register','edit'=>'edit','destroy'=>'destroy','update'=>'update']
        ];

        $pharmacistRoutes = [
            'inventory_of_drugs'
        ];

        $accountantRoutes = [
            'account_history',
            'account_add'
        ];

        $ar = ['getIndex'=>'patient.all',
            'postIndex'=>'patient.register',
            'getCreate'=>'patient.create',
            'getShow'=>'patient.view',
            'getEdit'=>'patient.edit',
            'postUpdate'=>'patient.update',
            'getDestroy'=>'patient.delete'
            ];

        $superUser = [
            $nurseRoutes['patient'],
            $doctorsRoutes['consultations']

        ];

         
        if(Auth::check()) {

       

        switch (Auth::user()->role) {
            case 'doctor':
                $path = $request->route()->getName();
                if(!array_has($doctorsRoutes,$path)) {
                    $request->session()->flash('role',"Access Denied");
                    return back();
                } 
                break;
            case 'nurse':
                // return true;
                break;

            case 'pharmacist':
                // code
                break;

            case 'lab_scientist':
                // code
                break;

            case 'accountant':
                // code
                break;
            
            default:
                // code...
                break;
        }
        } else {
            return redirect('/login');
        }
        return $next($request);
    }
}
