@extends('user.layout.master')
@section('title','Product View')
@section('content')

<!-- Google Fonts + Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
  }

  body {
    background: linear-gradient(135deg, #f0f0f0, #ffffff);
    padding: 50px 15px;
  }

  .product-container {
    display: flex;
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    max-width: 1100px;
    margin: auto;
    transition: all 0.3s ease-in-out;
  }

  .product-image {
    flex: 1.1;
    padding-right: 30px;
    position: relative;
  }

 .product-image img {
  width: 100%;
  height: 400px; /* Fixed height */
  object-fit: contain; /* Ensures full image fits without cropping */
  border-radius: 12px;
  border: 1px solid #ddd;
  background-color: #f9f9f9; /* Optional: adds background around transparent areas */
  transition: transform 0.3s;
}



  .product-image img:hover {
    transform: scale(1.03);
  }

  .product-details {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .product-name {
    font-size: 34px;
    font-weight: 700;
    color: #222;
    margin-bottom: 10px;
  }

  .product-price {
    font-size: 30px;
    color: #1a1a1a;
    font-weight: 600;
    margin-bottom: 20px;
  }

  .product-description {
    font-size: 16px;
    color: #555;
    line-height: 1.7;
    margin-bottom: 30px;
  }

  .product-ratings {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
  }

  .stars {
    color: #FFD700;
    font-size: 20px;
    margin-right: 8px;
  }

  .rating-count {
    font-size: 14px;
    color: #888;
  }

  .buttons {
    display: flex;
    gap: 15px;
    margin-top: auto;
  }

  .buttons button {
    flex: 1;
    padding: 15px 20px;
    font-size: 15px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  .add-to-cart {
    background: #111;
    color: #FFD700;
  }

  .add-to-cart:hover {
    background: #333;
    transform: translateY(-2px);
  }

  .add-to-wishlist {
    background: #FFD700;
    color: #111;
  }

  .add-to-wishlist:hover {
    background: #e6c200;
    transform: translateY(-2px);
  }

  .product-meta {
    margin-top: 35px;
    padding-top: 15px;
    border-top: 1px solid #eee;
    font-size: 14px;
    color: #666;
  }

  .meta-item {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
  }

  .meta-icon {
    color: #28a745;
    margin-right: 10px;
  }

  @media (max-width: 768px) {
    .product-container {
      flex-direction: column;
      padding: 20px;
    }

    .product-image {
      padding-right: 0;
      margin-bottom: 20px;
    }

    .buttons {
      flex-direction: column;
    }

    .buttons button {
      width: 100%;
    }
  }
</style>

<div class="product-container">
  <div class="product-image">
    <img src="{{ url('myimages/' . $product->product_image) }}" alt="{{ $product->product_name }}">
  </div>

  <div class="product-details">
    <div>
      <div class="product-name">{{ $product->product_name }}</div>
      <div class="product-price">${{ $product->product_price }}</div>
      <div class="product-description">{{ $product->product_description }}</div>

      <div class="product-ratings">
        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
        <div class="rating-count">(42 reviews)</div>
      </div>
    </div>

    <div class="buttons">
      <a href="{{ route('addtocart',['product_id'=>$product->product_id,'user_id'=> Auth::user()->id]) }}">
        <button class="add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
      </a>
      <a href="{{ route('addtowishlist',['product_id'=>$product->product_id,'user_id'=> Auth::user()->id]) }}">
        <button class="add-to-wishlist"><i class="fas fa-heart"></i> Wishlist</button>
      </a>
    </div>

    <div class="product-meta">
      <div class="meta-item"><i class="fas fa-check meta-icon"></i> Free shipping on orders over $50</div>
      <div class="meta-item"><i class="fas fa-check meta-icon"></i> 30-day return policy</div>
      <div class="meta-item"><i class="fas fa-check meta-icon"></i> 2-year manufacturer warranty</div>
    </div>
  </div>
</div>

@endsection
