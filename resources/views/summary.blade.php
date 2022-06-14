<div class="my-1 mx-2">

    <div></div>

    @if ($isVerbose)
        @foreach ($changes as $change)
            <div class="flex space-x-1">
                <span>{{ $change->file() }}</span>
                <span class="flex-1 content-repeat-[.] text-gray"></span>
                <span class="text-gray">{{ $change->issues() }} {{ $change->issues() > 1 ? 'issues' : 'issue' }}{{ $isDryRun ? '' : ' fixed' }}</span>
            </div>
        @endforeach
    @endif

    <hr class="text-gray">

    <div>
        <span>
            @if($isDryRun && count($changes) > 0)
                <div class="px-2 bg-yellow text-gray uppercase font-bold">wait</div>
                <em class="ml-1">
                    {{ $total - count($changes) }} files are respecting the <a class="font-bold" href="https://www.php-fig.org/psr/psr-12/">PSR 12</a> coding style.
                    Yet, <span class="text-yellow font-bold">{{ count($changes) }} {{ count($changes) > 1 ? 'files' : 'file' }}</span> have issues.
                </em>

                <div class="px-2 bg-blue text-white uppercase mt-1 font-bold">hint</div>
                <em class="ml-1">
                    You may run the <span class="italic font-bold">--fix</span> to fix the issues.
                </em>
            @else
                <div class="px-2 bg-green text-gray uppercase font-bold">OK</div>
                <em class="ml-1">
                    {{ $total }} files are respecting the <a class="font-bold" href="https://www.php-fig.org/psr/psr-12/">PSR 12</a> coding style.
                </em>
            @endif
        </span>
    </div>
</div>
