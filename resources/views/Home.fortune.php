<% extends("Master") %>

<% part("content") %>
    <section id="news">
        <blockquote class="news">
            <h2><i class="fa fa-newspaper-o"></i> News</h2>
            <p><strong>December 5, 2016:</strong> Opulence v1.0.0 has been released.  Read the <a href="{{! route('docs-index') !}}" title="Documentation">documentation</a> to learn how to get started.</p>
        </blockquote>
    </section>
    <section id="introduction">
        <h2><i class="fa fa-code"></i> Opulence - A modern framework for modern PHP</h2>
        <pre class="language-php"><code class="language-php"><span class="token variable">$router</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">get<span class="token punctuation">(</span></span><span class="token string">"/welcome/:name"</span><span class="token punctuation">,</span> <span class="token keyword">function</span> <span class="token punctuation">(</span>string <span class="token variable">$name</span><span class="token punctuation">)</span> <span class="token punctuation">{</span>
    <span class="token keyword">return</span> <span class="token string">"Welcome to Opulence,</span> <span class="token variable">$name</span><span class="token string">!"</span><span class="token punctuation">;</span>
<span class="token punctuation">}</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></pre>
    </section>
    <section id="installation">
        <h2><i class="fa fa-download"></i> Installing</h2>
        <pre class="language-php"><code class=" language-php">composer create<span class="token operator">-</span>project opulence<span class="token operator">/</span>project <span class="token operator">--</span>prefer<span class="token operator">-</span>dist</code></pre>
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
                <h4><i class="fa fa-chain-broken"></i> Loosely coupled</h4>
                <ul>
                    <li>
                        Automatically instantiate controllers with the <a href="{{! route('docs', $defaultBranch, 'ioc-container') !}}" title="Learn about dependency injection">DI container</a>.
                    </li>
                    <li>
                        20 out of 22 components have 0 dependencies.
                    </li>
                </ul>
            </article>
            <article>
                <h4><i class="fa fa-cogs"></i> Doesn't bleed into your code</h4>
                <ul>
                    <li>
                        Use plain-old PHP objects as <a href="{{! route('docs', $defaultBranch, 'http-basics') !}}#controllers" title="Learn about HTTP controllers">controllers</a>.
                    </li>
                    <li>
                        Use plain-old PHP objects in its <a href="{{! route('docs', $defaultBranch, 'orm-basics') !}}" title="ORM">ORM</a>.
                    </li>
                    <li>
                        Clear separation of application code and domain logic.
                    </li>
                </ul>
            </article>
            <article>
                <h4><i class="fa fa-thumbs-o-up"></i> No magic, just SOLID code</h4>
                <ul>
                    <li>
                        No magic under the hood.  <a href="https://github.com/opulencephp/Opulence" target="_blank" title="Source">The internals</a> are easy to understand and extend.
                    </li>
                    <li>
                        All Opulence components are unit-testable.
                    </li>
                    <li>
                        No "God" classes.
                    </li>
                </ul>
            </article>
            <article>
                <h4><i class="fa fa-rocket"></i> Fast</h4>
                <ul>
                    <li>
                        Written for PHP 7.
                    </li>
                    <li>
                        Handles ~1000 requests/second on a simple 2GB dual-core server.
                    </li>
                </ul>
            </article>
            <article>
                <h4><i class="fa fa-sitemap"></i> Scalable</h4>
                <ul>
                    <li>
                        Heavy caching in <a href="{{! route('docs', $defaultBranch, 'orm-data-mappers') !}}" title="Learn about data mappers">data mappers</a>.
                    </li>
                    <li>
                        Automatic caching of <a href="{{! route('docs', $defaultBranch, 'view-basics') !}}#caching" title="View caching">compiled views</a>.
                    </li>
                    <li>
                        <a href="{{! route('docs', $defaultBranch, 'sessions') !}}" title="Learn about sessions">Session support</a> for multiple servers.
                    </li>
                </ul>
            </article>
            <article>
                <h4><i class="fa fa-shield"></i> Secure</h4>
                <ul>
                    <li>
                        <a href="{{! route('docs', $defaultBranch, 'cryptography') !}}#encryption" title="Learn about encryption">Built-in encryption</a> that uses the latest secure practices.
                    </li>
                    <li>
                        <a href="{{! route('docs', $defaultBranch, 'view-fortune') !}}#sanitized-tags" title="Learn how to prevent cross-site scripting">Cross-site scripting prevention</a>.
                    </li>
                    <li>
                        <a href="{{! route('docs', $defaultBranch, 'http-security') !}}#cross-site-request-forgery" title="Learn how to prevent cross-site request forgeries">Cross-site request forgery prevention</a>.
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
