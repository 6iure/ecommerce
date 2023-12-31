<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">

	<div class="container-fluid">

		<a class="navbar-brand" href="#">Navbar</a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNav">

			<ul class="navbar-nav">

				@if (Auth::guest())

					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="{{ route('login') }}">Login</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">Register</a>
					</li>

				@else

                    <li>
                        <a class="nav-link" href="{{ route('categories.index') }}">Categorias</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Produtos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                          <li><a class="dropdown-item" href="{{ route('products.index') }}">Produtos</a></li>
                          <li><a class="dropdown-item" href="{{ route('transactions.index') }}">Transações</a></li>
                          <li><a class="dropdown-item" href="{{ route('stock-operations.index') }} ">Operações de Estoque</a></li>
                          <li><a class="dropdown-item" href="{{ route('transaction-products.index') }}">Transações de produtos</a></li>
                        </ul>
                      </li>

                    <li>
                        <a class="nav-link" href="{{ route('logout') }}">Sair</a>
                    </li>

				@endif


			</ul>

		</div>

	</div>

</nav>
