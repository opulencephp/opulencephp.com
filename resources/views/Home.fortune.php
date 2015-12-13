<% extends("Master") %>

<% part("content") %>
    <section id="introduction">
        <h2><i class="fa fa-code"></i> Opulence - A powerful new MVC framework for PHP</h2>
        <pre class="language-php"><code class="language-php"><span class="token variable">$router</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">"/welcome/:name"</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span><span class="token variable">$name</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token keyword">return</span> <span class="token string">"Welcome to Opulence,</span> <span class="token variable">$name</span><span class="token string">!"</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    </section>
    <section id="installation">
        <h2><i class="fa fa-download"></i> Installing</h2>
        <pre class="language-php"><code class=" language-php">composer create<span class="token operator">-</span>project opulence<span class="token operator">/</span>project <span class="token operator">--</span>prefer<span class="token operator">-</span>dist</code> <span class="token operator">--</span>stability<span class="token operator">=</span>dev</pre>
    </section>
    <section id="features">
        <div class="feature-wrapper">
            <h2><i class="fa fa-institution"></i> Features</h2>
            <article>
                <i class="fa fa-link"></i>
                <h4>Routing</h4>
                Use our powerful <a href="{{! route('docs', $defaultBranch, 'routing') !}}" title="Router">router</a> to <a href="{{! route('docs', $defaultBranch, 'routing#basic-usage') !}}" title="Controllers">handle requests</a>
            </article>
            <article>
                <i class="fa fa-file-code-o"></i>
                <h4>Views</h4>
                Create extendable, cacheable views using <a href="{{! route('docs', $defaultBranch, 'view-fortune') !}}" title="Views">Fortune</a>
            </article>
            <article>
                <i class="fa fa-bullseye"></i>
                <h4>Middleware</h4>
                Use <a href="{{! route('docs', $defaultBranch, 'http-middleware') !}}" title="Middleware">middleware</a> to manipulate your HTTP requests and responses
            </article>
            <article>
                <i class="fa fa-database"></i>
                <h4>ORM</h4>
                Use plain-old PHP objects and the repository and data mapper patterns for your <a href="{{! route('docs', $defaultBranch, 'orm-basics') !}}" title="ORM">ORM</a>
            </article>
            <article>
                <i class="fa fa-terminal"></i>
                <h4>Console</h4>
                Write your own powerful console commands using <a href="{{! route('docs', $defaultBranch, 'console-basics') !}}" title="Apex">Apex</a>
            </article>
            <article>
                <i class="fa fa-check"></i>
                <h4>Testing</h4>
                Integration test all your <a href="{{! route('docs', $defaultBranch, 'http-testing') !}}" title="Testing HTTP routes">HTTP routes</a> and <a href="{{! route('docs', $defaultBranch, 'console-testing') !}}" title="Testing console commands">console commands</a>
            </article>
        </div>
    </section>
    <section id="why-opulence">
        <div class="highlight-wrapper">
            <h2><i class="fa fa-question-circle"></i> Why Use Opulence?</h2>
            <article>
                <h4><i class="fa fa-rocket"></i> It's fast.</h4>
                <ul>
                    <li>
                        Opulence can handle 500 requests/second on a cheap 512MB server and 2,000 requests/second on a modest 8GB server.
                    </li>
                    <li>
                        Most of Opulence's settings are cached to reduce overhead on each request.
                    </li>
                </ul>
            </article>
            <article>
                <h4><i class="fa fa-wrench"></i> It's completely configurable.</h4>
                <ul>
                    <li>
                        Want to write your own implementation of an Opulence component?  Most are written to an interface, so you can <a href="{{! route('docs', $defaultBranch, 'dependency-injection') !}}" title="Learn about dependency injection">bind your implementation to Opulence at runtime</a>.
                    </li>
                </ul>
            </article>
            <article>
                <h4><i class="fa fa-sitemap"></i> It's scalable.</h4>
                <ul>
                    <li>
                        Need to take a load off your database?  Learn how data mappers can <a href="{{! route('docs', $defaultBranch, 'orm-data-mappers') !}}" title="Learn about data mappers">send 95% of queries to cache</a>.
                    </li>
                    <li>
                        Need session support with multiple servers?  We've <a href="{{! route('docs', $defaultBranch, 'sessions') !}}" title="Learn about sessions">got you covered</a>.
                    </li>
                </ul>
            </article>
            <article>
                <h4><i class="fa fa-chain-broken"></i> It's loosely coupled.</h4>
                <ul>
                    <li>
                        Want to use a component without downloading half the framework?  Most components have 0 dependencies.
                    </li>
                    <li>
                        Want to write your own app from scratch?  Opulence isn't bound to any config implementation like some frameworks.
                    </li>
                </ul>
            </article>
            <article>
                <h4><i class="fa fa-thumbs-o-up"></i> It doesn't bleed into your code.</h4>
                <ul>
                    <li>
                        Want to write an HTTP controller?  Use a <a href="{{! route('docs', $defaultBranch, 'http-basics') !}}#controllers" title="Learn about HTTP controllers">plain-old PHP object</a>.
                    </li>
                    <li>
                        Want to write a class that can be stored with ORM?  Use a plain-old PHP object.
                    </li>
                </ul>
            </article>
            <article>
                <h4><i class="fa fa-shield"></i> It's secure.</h4>
                <ul>
                    <li>
                        Need to store passwords?  Try our <a href="{{! route('docs', $defaultBranch, 'cryptography') !}}#hashing" title="Learn about hashing">hashing library</a>.
                    </li>
                    <li>
                        Need to prevent cross-site scripting attacks?  Try our <a href="{{! route('docs', $defaultBranch, 'view-fortune') !}}#sanitized-tags" title="Learn how to prevent cross-site scripting">template engine</a>.
                    </li>
                    <li>
                        Need to prevent cross-site request forgeries?  Try our <a href="{{! route('docs', $defaultBranch, 'http-security') !}}#cross-site-request-forgery" title="Learn how to prevent cross-site request forgeries">middleware</a>.
                    </li>
                </ul>
            </article>
        </div>
    </section>
    <section id="about">
        <h2><i class="fa fa-info-circle"></i> About</h2>
        Opulence was written by <a href="https://twitter.com/opulencephp" target="_blank" title="David's Twitter">David Young</a>, a math and computer science graduate from the University of Illinois at Urbana-Champaign.
    </section>
<% endpart %>