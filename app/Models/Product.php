<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Product extends Model
{
    protected $fillable = ['name', 'price','quantity','category_id','image','description'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function wishlistedBy(){
        return $this->belongsToMany(User::class,'user_wishlist')->withTimestamps();
    }

    public function scopeSearchByName($query,$name){
        if(!empty($name)){
            return $query->where('name','LIKE',"%{$name}%");
        }
        else
            return $query;
    }

    public function scopePriceRange($query,$max,$min){
        if($min != null){
            $query->where('price','>=',$min);
        }
        if($max != null){
            $query->where('price','<=',$max);
        }
        return $query;
    }

    public function scopeFilterByCategory($query,$category_id){
        if($category_id){
            return $query->where('category_id',$category_id);
        }
        return $query;
    }

    public function scopeInStock($query,$availability){
        if($availability == 'inStock'){
            return $query->where('quantity','>',0);
        }
        elseif($availability == 'outOfStock'){
            return $query->where('quantity','<=',0);
        }
        return $query;
    }

    public function deductStock($quantity): void{
        if($quantity<1){
            return;
        }
        $updated = static::where('id', $this->id)->where('quantity','>=',$quantity)
        ->decrement('quantity',$quantity);

        if($updated == 0){
            throw ValidationException::withMessages([
                'stock' => 'Out of Stock'
            ]);
        }
        $this->refresh();
    }
}
